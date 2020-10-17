<?php


class RedisMetricsStorage implements MetricsStorage
{

    public function saveRequestInfo(RequestInfo $requestInfo)
    {
        // TODO: Implement saveRequestInfo() method.
    }

    public function getRequestInfo(int $startTimeInSecond, int $endTimeInSecond)
    {
        // TODO: Implement getRequestInfos() method.
    }

    public function getApiRequestInfo(string $apiName, int $startTimeInSecond, int $endTimeInSecond)
    {
        // TODO: Implement getApiRequestInfo() method.
    }
}