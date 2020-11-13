<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/13
 * Time: 14:43
 * Email: <huangwalker@qq.com>
 */

class DarkLaunch
{
    private $darkRule;

    public function __construct()
    {
        $this->loadRule();
    }

    private function loadRule()
    {
        $ruleConfig = new DarkRuleConfig(config('dark-rule'));

        $this->darkRule = new DarkRule($ruleConfig);
    }
}