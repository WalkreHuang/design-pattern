<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/13
 * Time: 14:25
 * Email: <huangwalker@qq.com>
 */
return [
    [
        'key' => 'call_newapi_getUserById',
        'enabled' => true,
        'rule' => [
            'fixed' => [110, 210, 202],
            'range' => '1000-2000',
            'percentage' => 30,
        ],
    ],
    [
        'key' => 'call_newapi_registerUser',
        'enabled' => true,
        'rule' => [
            'percentage' => 20,
        ],
    ],
    [
        'key' => 'newalgo_loan',
        'enabled' => true,
        'rule' => [
            'range' => '0-200',
        ],
    ],
];