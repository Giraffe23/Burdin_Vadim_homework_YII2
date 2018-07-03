<?php

$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/db.php';

$config = [
    'id'             => 'basic',
    'basePath'       => dirname(__DIR__),
    'language'       => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'timeZone'       => 'Europe/Moscow',
    'bootstrap'      => ['log'],
    'aliases'        => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components'     => [
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'JNYpqh08n_0kpUddRlQYEMVHLXhyAOiG',
            'baseUrl'             => '',
        ],
        'cache'        => [
            'class' => yii\caching\FileCache::class,
        ],
        'user'         => [
            'identityClass'   => app\models\User::class,
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => yii\swiftmailer\Mailer::class,
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class'      => yii\log\FileTarget::class,
                    'logFile'    => '@runtime/logs/congratulations.log',
                    //'levels' => ['error', 'warning'],
                    'categories' => ['congratulations'],
                ],
            ],
        ],
        'db'           => $db,

        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
                //new \yii\web\UrlRule,
                //'note/<id:\d+>'                => 'note/update',
                'user/<id:\d+>'                => 'user/view',
                'user/update/<id:\d+>'         => 'user/update',
                //'access/create/<noteId:\d+>'   => 'access/create',
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/view',
                //'noteview'                     => 'note/view',
                //'<controller:[\w-]+>/<noteId:\d+>' => '<controller>/create',

            ],
        ],
        'i18n' => [
            'translations' => [
                'yii*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl'  => '@web/assets',
        ],
        'service'      => [
            'class' => app\components\Service::class,
            'prop'  => 'Just Do It!',
        ],
    ],
    'params'         => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class'      => yii\debug\Module::class,
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class'      => yii\gii\Module::class,
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*', '::1'],
    ];
}

return $config;
