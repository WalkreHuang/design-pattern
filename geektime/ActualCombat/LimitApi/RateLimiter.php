<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/9
 * Time: 11:11
 * Email: <huangwalker@qq.com>
 */

/**
 * RateLimiter 类用来串联整个限流流程。它先读取限流规则配置文件，映射为内存中的对象（RuleConfig）
 * 然后再将这个中间结构构建成一个支持快速查询的数据结构（RateLimitRule）。
 * 除此之外，这个类还提供供用户直接使用的最顶层接口（limit() 接口）。
 * Class RateLimiter
 */
class RateLimiter
{
    private static $log;

    //api存储限流计数器
    private $counters = [];

    /**
     * @var TrieRateLimitRule
     */
    private $rule;

    public function __construct()
    {
        $ruleConfig = config('ratelimiter-rule');

        // 将限流规则构建成支持快速查找的数据结构RateLimitRule
        $this->rule = new TrieRateLimitRule($ruleConfig);
    }

    public function limit($appId, $url)
    {
        $apiLimit = $this->rule->getLimit($appId, $url);
        if (is_null($apiLimit)) {
            return true;
        }

        // 获取api对应在内存中的限流计数器（rateLimitCounter）
        $counterKey = $appId.':'.$apiLimit->getApi();

        $rateLimitCounter = $this->counters[$counterKey];
        if (is_null($rateLimitCounter)) {
            $newRateLimitCounter = new FixedTimeWinRateLimitAlg($apiLimit->getLimit());
            $this->counters[$counterKey] = $newRateLimitCounter;

            $rateLimitCounter = $newRateLimitCounter;
        }

        return $rateLimitCounter->tryAcquire();
    }
}