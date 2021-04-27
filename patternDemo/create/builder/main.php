<?php
/**
 *
 * User: huangwalker
 * Date: 2021/4/27
 * Time: 14:21
 * Email: <huangwalker@qq.com>
 */

require_once 'PoolBuilder.php';
require_once 'ResourcePool.php';

$resource_pool = (new PoolBuilder())->setName('dbConnectPool')
                    ->setMaxTotal(100)
                    ->setMinIdle(100)
                    ->setMaxIdle(100)
                    ->build();

var_dump($resource_pool);