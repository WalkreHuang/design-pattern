<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/9
 * Time: 11:12
 * Email: <huangwalker@qq.com>
 */

class RuleConfig
{
    /**
     * @var AppRuleConfig[]
     */
    private $configs = [];

    /**
     * @return AppRuleConfig[]
     */
    public function getConfigs()
    {
        return $this->configs;
    }

    /**
     * @param  AppRuleConfig[]  $configs
     * @return $this
     */
    public function setConfigs($configs)
    {
        $this->configs = $configs;
        return $this;
    }


}