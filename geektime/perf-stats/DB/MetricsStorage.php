<?php


interface MetricsStorage
{
    public function saveRequestInfo(RequestInfo $requestInfo);

    public function getRequestInfo(int $startTimeInSecond, int $endTimeInSecond);

    public function getApiRequestInfo(string $apiName, int $startTimeInSecond, int $endTimeInSecond);
}