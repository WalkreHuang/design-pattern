<?php

//常规的写法，会侵入业务代码
class UserController
{
    private $metricsCollector;

    public function __construct(MetricsCollector $metricsCollector)
    {
        $this->metricsCollector = $metricsCollector;
    }

    public function login()
    {
        $startTimestamp = time();

        echo 'login service handle';

        $endTimeStamp = time();
        $responseTime = $endTimeStamp - $startTimestamp;
        $requestInfo = new RequestInfo("login", $responseTime, $startTimestamp);
        $this->metricsCollector->recordRequest($requestInfo);
    }

    public function register()
    {
        $startTimestamp = time();

        echo 'register service handle';

        $endTimeStamp = time();
        $responseTime = $endTimeStamp - $startTimestamp;
        $requestInfo = new RequestInfo("register", $responseTime, $startTimestamp);
        $this->metricsCollector->recordRequest($requestInfo);
    }
}
