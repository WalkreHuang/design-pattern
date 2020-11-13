<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/13
 * Time: 14:58
 * Email: <huangwalker@qq.com>
 */

class DarkFeatureConfig
{
    /**
     * @var string
     */
    private $key;
    /**
     * @var boolean
     */
    private $enabled;
    /**
     * @var array
     */
    private $rule;

    public function __construct($key, $enabled, $rule)
    {
        $this->key = $key;
        $this->enabled = $enabled;
        $this->rule = $rule;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return array
     */
    public function getRule()
    {
        return $this->rule;
    }


}