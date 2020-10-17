<?php

/**
 * 类的功能：根据原始请求数据，计算得到接口统计数据
 * Class Aggregator
 */
class Aggregator
{
    /**
     * 统计接口响应数据
     * @param $requestInfos
     * @param int $durationInSecond
     */
    public function aggregate(array $requestInfos, int $durationInSecond)
    {
        $maxRespTime = PHP_INT_MAX;
        $minRespTime = PHP_INT_MIN;

        $avgRespTime = -1;
        $p999RespTime = -1;
        $p99RespTime = -1;
        $sumRespTime = 0;

        $count = 0;
        /**
         * 找出所有请求中响应时间最大、小的时间，并统计请求的总时间
         */
        foreach ($requestInfos as $requestInfo) {
            ++$count;
            $respTime = $requestInfo->getResponseTime();
            if ($maxRespTime < $respTime) {
                $maxRespTime = $respTime;
            }
            if ($minRespTime > $respTime) {
                $minRespTime = $respTime;
            }

            $sumRespTime += $respTime;
        }

        if ($count !== 0) {
            $avgRespTime = $sumRespTime / $count;
        }

        //每秒请求数
        $tps = (double) ($count / $durationInSecond);

        /**
         * 按照请求响应时间给所有请求进行排序
         */
        usort($requestInfos, function ($a, $b) {
            if ($a->getResponseTime() > $b->getResponseTime()) {
                return -1;
            }

            if ($a->getResponseTime() < $b->getResponseTime()) {
                return 1;
            }

            return 0;
        });

        $idx999 = (int) $count * 0.999;
        $idx99 = (int) $count * 0.99;
        if ($count !== 0) {
            $p999RespTime = $requestInfos[$idx999]->getResponseTime();
            $p99RespTime = $requestInfos[$idx99]->getResponseTime();
        }

        $requestStat = new RequestStat();
        $requestStat->setMaxResponseTime($maxRespTime)
            ->setMinResponseTime($minRespTime)
            ->setAvgResponseTime($avgRespTime)
            ->setP99ResponseTime($p99RespTime)
            ->setP999ResponseTime($p999RespTime)
            ->setCount($count)
            ->setTps($tps);

        return $requestStat;
    }


}