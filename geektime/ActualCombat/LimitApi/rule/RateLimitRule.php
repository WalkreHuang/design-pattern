<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/9
 * Time: 15:43
 * Email: <huangwalker@qq.com>
 */

interface RateLimitRule
{
    public function getLimit($appId, $api);
}