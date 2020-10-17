<?php


class MetricsCollector
{
    private $metricsStorage;

    public function __construct(MetricsStorage $metricsStorage)
    {
        $this->metricsStorage = $metricsStorage;
    }

    public function recordRequest(RequestInfo $requestInfo)
    {
        if (!$requestInfo || empty($requestInfo->getApiName())) {
            return;
        }

        $this->metricsStorage->saveRequestInfo($requestInfo);
    }
}