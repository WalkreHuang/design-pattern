<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/9
 * Time: 11:13
 * Email: <huangwalker@qq.com>
 */

class RateLimitAlg
{
    private $limit;

    public function __construct($limit)
    {
        $this->limit = $limit;
    }

    public function tryAcquire()
    {
        $updatedCount = $this->increment();
        if ($updatedCount <= $this->limit) {
            return true;
        }


    }
}