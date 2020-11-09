<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/9
 * Time: 11:51
 * Email: <huangwalker@qq.com>
 */

class AppRuleConfig
{
    private $appId;

    /**
     * @var ApiLimit[]
     */
    private $limits;

    public function __construct($appId, $limits)
    {
        $this->appId = $appId;
        $this->limits = $limits;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param  mixed  $appId
     * @return $this
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLimits()
    {
        return $this->limits;
    }

    /**
     * @param  mixed  $limits
     * @return $this
     */
    public function setLimits($limits)
    {
        $this->limits = $limits;
        return $this;
    }


}