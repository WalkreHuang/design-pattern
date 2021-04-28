<?php

require_once 'DynamicLogProxy.php';
require_once 'OrderController.php';
require_once 'UserController.php';

$storage = new RedisMetricsStorage();
$metricsCollector = new MetricsCollector($storage);
$proxy = new DynamicLogProxy($metricsCollector);

$userController = new UserController();
$userController = $proxy->createProxy($userController);
$userController->login();

$orderController = new OrderController();
$orderController = $proxy->createProxy($orderController);
$orderController->addOrder();