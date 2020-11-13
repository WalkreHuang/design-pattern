<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/13
 * Time: 15:11
 * Email: <huangwalker@qq.com>
 */

class DarkRule
{
    private $darkFeatures = [];

    public function __construct(DarkRuleConfig $darkRuleConfig)
    {
        $darkFeatureConfigs = $darkRuleConfig->getFeatures();

        foreach ($darkFeatureConfigs as $featureConfig) {
            $this->darkFeatures[$featureConfig->getKey()] = new DarkFeature($featureConfig);
        }
    }

    /**
     * @return array
     */
    public function getDarkFeatures()
    {
        return $this->darkFeatures;
    }


}