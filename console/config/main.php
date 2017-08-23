<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
    ],
    'modules' => [
    
    'rbac' => 'dektrium\rbac\RbacConsoleModule',
    
],
    'components' => [
		//'authManager' => [
            //'class' => 'yii\rbac\PhpManager',
		//	'defaultRoles' => ['superadmin', 'admin', 'administrator', 'user', 'guest'],
        //],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

		'session' => [ // for use session in console application
				'class' => 'yii\web\Session'
		],
    ],	 
    'params' => $params,
];

if (YII_ENV_DEV) {

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}


return $config;
