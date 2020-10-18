<?php

$storage = new RedisMetricsStorage();
$aggregator = new Aggregator();
$collector = new MetricsCollector($storage);

$collector->recordRequest(new RequestInfo("register", 123, 23));
$collector->recordRequest(new RequestInfo("register", 1232, 230));
$collector->recordRequest(new RequestInfo("register", 5123, 238));
$collector->recordRequest(new RequestInfo("login", 542, 2380));

//触发统计
$consoleView = new ConsoleView();
$consoleReport = new ConsoleReporter($storage, $aggregator, $consoleView);
$consoleReport->startRepeatedReport(60, 60);