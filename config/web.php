<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'FORTALENTO',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'es-VE',
    //'defaultRoute' => '/site/login',
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
				'assignment' => [
					'class' => 'mdm\admin\controllers\AssignmentController',
					'userClassName' => 'app\models\User',
					'idField' => 'id',
				],
			],
			'layout' => 'left-menu', //otros valores 'right-menu', 'top-menu' y 'null'
			/*'menus' => [
                'assignment' => [
                    'label' => 'Grand Access' 
                ],
                'route' => null, // deshabilitar ítem
            ],*/
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'VwzzDEw9PPJLyGgKksAYL1D2bUgU0n3g',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'formatter' => [
            'dateFormat' => 'dd-MM-yyyy',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => 'Bs',
        ],
        'db' => require(__DIR__ . '/db.php'),
        'fortalento' => require(__DIR__ . '/fortalento.php'),
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // o 'yii\rbac\PhpManager'
        ]
    ],
    'params' => $params,
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
        // agregar acciones para permitir acceso a todos
            'site/*', 
            // Eliminar cuando ya se haya configurado un usuario administrador
            //'admin/*', 
            'gii/*', 
            // Eliminar todo abajo cuando se haya configurado el acceso a usuarios
            /*'procesos/*',
            'estudiantes/*',
            'inscripciones/*',
            'estudio-socio-economico/*',*/
        ]
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
