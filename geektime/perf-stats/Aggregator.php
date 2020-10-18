<?php

/**
 * 类的功能：根据原始请求数据，计算得到接口统计数据
 * Class Aggregator
 */
class Aggregator
{
    /**
     * 统计接口响应数据
     * @param $requestInfoMap
     * @param int $durationInSecond
     */
    public function aggregate(array $requestInfoMap, int $durationInSecond)
    {
        $requestHash = [];
        foreach ($requestInfoMap as $apiName => $requestInfos) {
            $requestStat = $this->doAggregate($requestInfos, $durationInSecond);
            $requestHash[$apiName] = $requestStat;
        }

        return $requestHash;
    }

    private function doAggregate($requestInfos, int $durationInSecond)
    {
        $respTimes = [];

        foreach ($requestInfos as $requestInfo) {
            $respTimes[] = $requestInfo->getResponseTime();
        }

        $requestStat = new RequestStat();
        $requestStat->setMaxResponseTime($this->max($respTimes))
            ->setMinResponseTime($this->min($respTimes))
            ->setAvgResponseTime($this->avg($respTimes))
            ->setP99ResponseTime($this->percentile99($respTimes))
            ->setP999ResponseTime($this->percentile999($respTimes))
            ->setCount(count($respTimes))
            ->setTps($this->tps(count($respTimes), $durationInSecond));
    }

    private function max(array $dataset)
    {
        return max($dataset);
    }

    private function min(array $dataset)
    {
        return min($dataset);
    }

    private function avg(array $respTimes)
    {
        return (sum($respTimes) / count($respTimes));
    }

    private function percentile99(array $respTimes)
    {
        sort($respTimes);
        $idx99 = (int) count($respTimes) * 0.99;
        return $respTimes[$idx99];
    }

    private function percentile999(array $respTimes)
    {
        sort($respTimes);
        $idx999 = (int) count($respTimes) * 0.999;
        return $respTimes[$idx999];
    }

    private function tps(int $count, int $durationInSecond)
    {
        return $count/$durationInSecond;
    }

}