<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/9
 * Time: 15:48
 * Email: <huangwalker@qq.com>
 */

interface RateLimitAlg
{
    public function tryAcquire();
}