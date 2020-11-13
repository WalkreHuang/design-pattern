<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/13
 * Time: 11:52
 * Email: <huangwalker@qq.com>
 */

// 代码目录结构
/*    GrayReleased
        --DarkLaunch(框架的最顶层入口类)
        --DarkFeature(每个feature的灰度规则)
        --DarkRule(灰度规则)
        --DarkRuleConfig(用来映射配置到内存中)*/

$darkLaunch = new DarkLaunch();
$darkFeature = $darkLaunch->getDarkFeature('call_newapi_getUserbyId');

$darkFeature->enabled();
$darkFeature->dark(666);