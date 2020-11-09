<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/9
 * Time: 14:58
 * Email: <huangwalker@qq.com>
 */

/**
 * @param $file
 * @return false|string
 * @author clh
 * @time 2020/11/9
 */
function config($file)
{
    $config_file = __DIR__.'../config/'.$file.'.php';
    return file_get_contents($config_file);
}