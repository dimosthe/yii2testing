<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
            'defaultRoles' => ['admin','editor','user'], // here define your roles
            'itemFile' => '@console/data/items.php',
            'assignmentFile' => '@console/data/assignments.php',
            'ruleFile' => '@console/data/rules.php'
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@backend/views/user' //overrides views for yii2-user
                ],
            ],
        ],
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // your rules go here
            ],
		  ]*/
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
            'components' => [
                'manager' => [
                    'userClass' => 'common\models\User', //overrides User model
                ],
            ],
            'controllerMap' => [
                'security' => 'common\controllers\SecurityController'
            ],
            'urlRules' => [
                '<id:\d+>'                     => 'profile/show',
                //'<action:(login|logout)>'      => 'security/<action>',
                //'<action:(register|resend)>'   => 'registration/<action>',
                /*'confirm/<id:\d+>/<token:\w+>' => 'registration/confirm',
                'forgot'                       => 'recovery/request',
                'recover/<id:\d+>/<token:\w+>' => 'recovery/reset',
                'settings/<action:\w+>'        => 'settings/<action>'*/
            ]

        ],
         /*'admin' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'dektrium\user\models\User',
                    'idField' => 'id', // id field of model User
                ],
            ],
            'layout' => 'left-menu', // default null. other avaliable value 'right-menu' and 'top-menu'
        
        ]*/
    ],
    /*'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'admin/*', // add or remove allowed actions to this list
        ]
    ],*/

];
