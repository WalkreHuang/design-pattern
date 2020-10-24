<?php
//调用示例：
$storage = new RedisMetricsStorage();
$metricsCollector = new MetricsCollector($storage);
$userController = new UserController();
(new ProxyController($metricsCollector, $userController))->login();