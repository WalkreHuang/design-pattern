<?php
//调用示例：
$storage = new RedisMetricsStorage();
$metricsCollector = new MetricsCollector($storage);
$userController = new UserController();

$proxy = new DynamicProxyController($metricsCollector);
$userController = $proxy->createProxy($userController);
$userController->login();
