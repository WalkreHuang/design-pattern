<?php


class DynamicLogProxy
{
    private $proxy_object;
    private $metric_controller;

    public function __construct(MetricsCollector $controller)
    {
        $this->metric_controller = $controller;
    }

    public function createProxy($proxy_object)
    {
        $this->proxy_object = $proxy_object;
    }

    public function __call($method, $args)
    {
        $reflect_obj = new \ReflectionClass($this->proxy_object);
        if (!$reflect_obj->hasMethod($method)) {
            throw new RuntimeException("class miss method:{$method}");
        }

        $call_method = $reflect_obj->getMethod($method);

        $startTimestamp = time();

        $response = $call_method->invokeArgs($this->proxy_object, $args);

        $endTimeStamp = time();
        $responseTime = $endTimeStamp - $startTimestamp;
        $requestInfo = new RequestInfo("log", $responseTime, $startTimestamp);
        $this->metric_controller->recordRequest($requestInfo);

        return $response;
    }
}