<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/13
 * Time: 15:18
 * Email: <huangwalker@qq.com>
 */

class DarkFeature
{
    private $key;
    private $enabled;
    private $percentage;
    private $rangeSet;

    public function __construct(DarkFeatureConfig $darkFeatureConfig)
    {
        $this->key = $darkFeatureConfig->getKey();
        $this->enabled = $darkFeatureConfig->isEnabled();
    }
}