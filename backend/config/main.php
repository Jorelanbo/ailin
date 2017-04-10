<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'timeZone' => 'Asia/Shanghai',
    'basePath' => dirname(__DIR__),
    'name' => 'Ailing HouseKeeping',
    'version' => '1.0',
    'charset' => 'UTF-8',
    'sourceLanguage' => 'en-US',
    'language' => 'zh-CN',
    'controllerNamespace' => 'app\\modules\\common\\controllers',
    'defaultRoute' => 'common/site/index',
    'bootstrap' => [
        'log'
    ],
    'modules' => [
        'common' => [
            'class' => 'app\modules\common\Module',
        ],
        'datas' => [
            'class' => 'app\modules\datas\Module',
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'app\models\common\Account',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-backend',
                'httpOnly' => true,
            ],
            'loginUrl' => [
                '/common/site/login'
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'common/site/error',
        ],
        'i18n' => [// 多语言组件配置，每个应用app都有独立的多语言配置，减少相关度
            'translations' => [
                //只配置一个应用
                'backend'=> [// 匹配所有翻译//通用配置，使用*配置所有应用，再以fileMap分隔
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath'=>'@app/messages',//统一存储为一个翻译包
                    //'sourceLanguage' => Yii::$app->sourceLanguage,
                    /*
                    'fileMap'=>[// 简单的映射
                        'common'=>'common.php',
                        'backend'=>'backend.php',//控制中心
                        'console'=>'console.php',//控制台
                        'declare'=>'declare.php',//海关申报
                        'merchant'=>'merchant.php',//所有类型的商户
                        'supply'=>'supply.php',//供应商
                        'yii' => 'yii.php',
                    ],
                    */
                    'on missingTranslation' => ['app\events\TranslationEventHandler', 'handleMissingTranslation'],//事件解决，获取未翻译内容
                ],
                'common'=> [// 匹配所有翻译//通用配置，使用*配置所有应用，再以fileMap分隔
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath'=>'@common/messages',//统一存储为一个翻译包
                    //'sourceLanguage' => Yii::$app->sourceLanguage,
                    'on missingTranslation' => ['app\events\TranslationEventHandler', 'handleMissingTranslation'],//事件解决，获取未翻译内容
                ],
                //以上分开来配置，而不是使用*，可以有效的保证应用分离，功能独立理解清楚
            ]
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
