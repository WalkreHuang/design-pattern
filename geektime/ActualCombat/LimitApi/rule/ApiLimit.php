<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/9
 * Time: 11:12
 * Email: <huangwalker@qq.com>
 */

class ApiLimit
{
    const DEFAULT_TIME_UNIT = 1;//1 second

    private $api;
    private $limit;
    private $unit;

    public function __construct($api, $limit, $unit = self::DEFAULT_TIME_UNIT)
    {
        $this->api = $api;
        $this->limit = $limit;
        $this->unit = $unit;
    }

    /**
     * @return mixed
     */
    public function getApi()
    {
        return $this->api;
    }

    /**
     * @param  mixed  $api
     * @return $this
     */
    public function setApi($api)
    {
        $this->api = $api;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param  mixed  $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param  int  $unit
     * @return $this
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }


}