<?php


class DynamicProxyController
{
    private $metricsCollector;

    private $proxyObject;

    public function __construct(MetricsCollector $metricsCollector)
    {
        $this->metricsCollector = $metricsCollector;
    }

    public function createProxy(object $object)
    {
        $this->proxyObject = $object;
        return $this;
    }

    public function __call($method, $arguments)
    {
        $reflection_obj = new ReflectionClass($this->proxyObject);
        if (!$reflection_obj->hasMethod($method)) {
            throw new \Exception('method not exist!');
        }

        $startTimestamp = time();

        $call_method = $reflection_obj->getMethod($method);
        $service_resp = $this->callMethod($call_method, $arguments);

        $endTimeStamp = time();
        $responseTime = $endTimeStamp - $startTimestamp;
        $requestInfo = new RequestInfo("login", $responseTime, $startTimestamp);
        $this->metricsCollector->recordRequest($requestInfo);

        return $service_resp;
    }

    private function callMethod($method, $arguments)
    {
        $method->invokeArgs($this->proxyObject, $arguments);
    }
}
