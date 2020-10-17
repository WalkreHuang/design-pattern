<?php


class RequestInfo
{
    private $apiName;
    private $responseTime;
    private $timestamp;

    public function __construct($apiName, $responseTime, $timestamp)
    {
        $this->apiName = $apiName;
        $this->responseTime = $responseTime;
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getApiName()
    {
        return $this->apiName;
    }

    /**
     * @param mixed $apiName
     * @return RequestInfo
     */
    public function setApiName($apiName)
    {
        $this->apiName = $apiName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponseTime()
    {
        return $this->responseTime;
    }

    /**
     * @param mixed $responseTime
     * @return RequestInfo
     */
    public function setResponseTime($responseTime)
    {
        $this->responseTime = $responseTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     * @return RequestInfo
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

}