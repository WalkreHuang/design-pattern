<?php

$storage = new RedisMetricsStorage();
$collector = new MetricsCollector($storage);

$collector->recordRequest(new RequestInfo("register", 123, 23));
$collector->recordRequest(new RequestInfo("register", 1232, 230));
$collector->recordRequest(new RequestInfo("register", 5123, 238));
$collector->recordRequest(new RequestInfo("login", 542, 2380));

//触发统计
$consoleReport = new ConsoleReporter($storage);
$consoleReport->startRepeatedReport(60, 60);