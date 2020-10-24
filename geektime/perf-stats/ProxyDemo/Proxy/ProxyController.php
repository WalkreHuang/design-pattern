<?php


class ProxyController implements IUserController
{
    private $userCollector;
    private $metricsCollector;

    public function __construct(MetricsCollector $metricsCollector, UserController $userCollector)
    {
        $this->metricsCollector = $metricsCollector;
        $this->userCollector = $userCollector;
    }

    public function login()
    {
        $startTimestamp = time();

        $this->userCollector->login();

        $endTimeStamp = time();
        $responseTime = $endTimeStamp - $startTimestamp;
        $requestInfo = new RequestInfo("login", $responseTime, $startTimestamp);
        $this->metricsCollector->recordRequest($requestInfo);
    }

    public function register()
    {
        // TODO: Implement register() method.
    }

}