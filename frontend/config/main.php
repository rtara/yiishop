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
	    'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
			'class' => 'frontend\components\LangRequest'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
			'class'=>'frontend\components\LangUrlManager',
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
            'currency' => 'р.', //Валюта
            'currencyPosition' => 'after', //after или before (позиция значка валюты относительно цены)
            'priceFormat' => [2,'.', ''], //Форма цены
        ],
    ],
    'modules' => [
        'cart' => [
            'class' => 'dvizh\cart\Module',
        ],
        'params' => $params,
    ],
];
