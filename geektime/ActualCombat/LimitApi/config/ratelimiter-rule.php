<?php
/**
 *
 * User: huangwalker
 * Date: 2020/11/9
 * Time: 11:27
 * Email: <huangwalker@qq.com>
 */

return [
    'configs' => [//对应RuleConfig
       [//对应AppRuleConfig
           'appId' => 'app-1',
           'limits' => [
               [//对应ApiLimit
                   'api' => '/v1/user',
                   'limit' => 100,
                   'unit' => 60,
               ],
               [
                   'api' => '/v1/order',
                   'limit' => 50,
               ]
           ]
       ],
        [
            'appId' => 'app-2',
            'limits' => [
                [
                    'api' => '/v1/user',
                    'limit' => 50,
                ],
                [
                    'api' => '/v1/order',
                    'limit' => 50,
                ]
            ]
        ]
    ]
];