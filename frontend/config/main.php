<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
	'language'=>'uk-UK',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'authClientCollection' => [
        'class' => yii\authclient\Collection::className(),
        
        
        'clients' => [
            'facebook' => [
                'class'        => 'dektrium\user\clients\Facebook',
                'clientId'     => '1519297754799896',
                'clientSecret' => '38d3125c81ea4e6e780cb93e6ceb4595',
            ],
        'twitter' => [
            'class'          => 'dektrium\user\clients\Twitter',
            'consumerKey'    => 'CONSUMER_KEY',
            'consumerSecret' => 'CONSUMER_SECRET',
        ],
        'google' => [
            'class'        => 'dektrium\user\clients\Google',
            'clientId'     => 'CLIENT_ID',
            'clientSecret' => 'CLIENT_SECRET',
        ],
    ],
],
	    'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
			'class' => 'frontend\components\LangRequest'
        ],
        'user' => [
            
            'as frontend' => 'dektrium\user\filters\FrontendFilter',
            
            'identityCookie' => [
                'name' => '_identity-frontend',
                'path'     => '/',
                'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            //'name' => 'advanced-frontend',
            'name' => 'FRONTENDSESSID',
        'cookieParams' => [
            'httpOnly' => true,
            'path'     => '/',
            ],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//			'class'=>'frontend\components\LangUrlManager',
            'rules' => [
				'/' => 'site/index',
//				'<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
                'category/<id:\d+>' => 'category/view',
                'product/<id:\d+>' => 'product/view',
            ],
        ],
		'i18n' => [
			'translations' => [
				'*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@frontend/messages',
					'sourceLanguage' => 'uk',
					'fileMap' => [
						//'main' => 'main.php',
					],
				],
			],
		],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@frontend/themes/web6themes/view'
                ]
            ]
        ],
        'cart' => [
            'class' => 'dvizh\cart\Cart',
            'currency' => '.', //Валюта
            'currencyPosition' => 'after', //after или before (позиция значка валюты относительно цены)
            'priceFormat' => [2,'.', ''], //Форма цены
        ],
    ],
    'modules' => [
        
        'rbac' => 'dektrium\rbac\RbacWebModule',
        
        'user' => [
            'class' => 'dektrium\user\Module',
//            'enableUnconfirmedLogin' => true,
//            'confirmWithin' => 21600,
//            'cost' => 12,
//            'urlRules' => [],
//            'urlPrefix' => 'user',
            'adminPermission' => true,
            'admins' => ['kuzik'],
//            'controllerMap' => [
//                'admin' => [
//                    'class' => 'dektrium\user\controllers\AdminController',
//                    'as access' => [
//                        'class' => 'yii\filters\AccessControl',
//                        'rules' => [
//                            [
//                                'allow' => true,
//                                'roles' => ['administrateUser'],
//                            ],
//                            [
//                                'actions' => ['switch'],
//                                'allow' => true,
//                                'roles' => ['@'],
//                            ],
//                        ],
//                    ],
//                ],
//            ],
        ],
//        
//        'user' => [
//                    'class' => 'dektrium\user\Module',
//                    'enableUnconfirmedLogin' => true,
//                    'confirmWithin' => 21600,
//                    'cost' => 12,
//                    'urlRules' => ['user'],
//                    'urlPrefix' => user,
//                    'admins' => ['admin'],
//                    'adminPermission' => 'administrateUser'
//         ],
        'cart' => [
            'class' => 'dvizh\cart\Module',
        ],
        'params' => $params,   

        'order' => [
            'class' => 'dvizh\order\Module',
            'layoutPath' => 'frontend\views\layouts',
            'successUrl' => '/cartview/payment', //Страница, куда попадает пользователь после успешного заказа
            'adminNotificationEmail' => 'test@yandex.ru', //Мыло для отправки заказов
        ],
    ],
        

];


