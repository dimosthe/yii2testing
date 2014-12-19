<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // your rules go here
                '<action:(login|logout)>'      => 'user/security/<action>',
                '<action:(register|resend)>'   => 'user/registration/<action>',
                'confirm/<id:\d+>/<token:\w+>' => 'user/registration/confirm',
                'forgot'                       => 'user/recovery/request',
                'recover/<id:\d+>/<token:\w+>' => 'userrecovery/reset',
                'settings/<action:\w+>'        => 'user/settings/<action>',
            


                '<action>'=>'site/<action>'

			]
		],
		'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
			'baseUrl' => '/admin',
			'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // your rules go here
            ]
		],
		'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
