<?php


class RequestStat
{
    private $maxResponseTime;
    private $minResponseTime;
    private $avgResponseTime;
    private $p999ResponseTime;
    private $p99ResponseTime;
    private $count;
    private $tps;

    /**
     * @return mixed
     */
    public function getMaxResponseTime()
    {
        return $this->maxResponseTime;
    }

    /**
     * @param mixed $maxResponseTime
     * @return RequestStat
     */
    public function setMaxResponseTime($maxResponseTime)
    {
        $this->maxResponseTime = $maxResponseTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMinResponseTime()
    {
        return $this->minResponseTime;
    }

    /**
     * @param mixed $minResponseTime
     * @return RequestStat
     */
    public function setMinResponseTime($minResponseTime)
    {
        $this->minResponseTime = $minResponseTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvgResponseTime()
    {
        return $this->avgResponseTime;
    }

    /**
     * @param mixed $avgResponseTime
     * @return RequestStat
     */
    public function setAvgResponseTime($avgResponseTime)
    {
        $this->avgResponseTime = $avgResponseTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getP999ResponseTime()
    {
        return $this->p999ResponseTime;
    }

    /**
     * @param mixed $p999ResponseTime
     * @return RequestStat
     */
    public function setP999ResponseTime($p999ResponseTime)
    {
        $this->p999ResponseTime = $p999ResponseTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getP99ResponseTime()
    {
        return $this->p99ResponseTime;
    }

    /**
     * @param mixed $p99ResponseTime
     * @return RequestStat
     */
    public function setP99ResponseTime($p99ResponseTime)
    {
        $this->p99ResponseTime = $p99ResponseTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     * @return RequestStat
     */
    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTps()
    {
        return $this->tps;
    }

    /**
     * @param mixed $tps
     * @return RequestStat
     */
    public function setTps($tps)
    {
        $this->tps = $tps;
        return $this;
    }

}