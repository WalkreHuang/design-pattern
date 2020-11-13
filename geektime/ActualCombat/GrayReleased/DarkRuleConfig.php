<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/13
 * Time: 14:48
 * Email: <huangwalker@qq.com>
 */

class DarkRuleConfig
{
    /**
     * DarkFeatureConfig[]
     */
    private $features;

    public function __construct(array $ruleConfig)
    {
        foreach ($ruleConfig as $config) {
            $this->features[] = new DarkFeatureConfig($config['key'], $config['enabled'], $config['rule']);
        }
    }

    /**
     * @return DarkFeatureConfig[]
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @param  mixed  $features
     * @return $this
     */
    public function setFeatures($features)
    {
        $this->features = $features;
        return $this;
    }


}