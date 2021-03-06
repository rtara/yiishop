<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		//'authManager' => [
            //'class' => 'yii\rbac\PhpManager',
            //'defaultRoles' => ['superadmin', 'admin', 'administrator', 'user', 'guest'],
       // ],  

    ],
    'modules' => [
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'urlRules' => [],
            'urlPrefix' => 'user', 
            'admins' => ['admin'],
            'controllerMap' => [
                'admin' => [
                    'class' => 'dektrium\user\controllers\AdminController',
                    'as access' => [
                        'class' => 'yii\filters\AccessControl',
                        'rules' => [
                            [
                                'allow' => true,
                                'roles' => ['administrateUser'],
                            ],
                            [
                                'actions' => ['switch'],
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                        ],
                    ],
                ],
            ],
        ],

        'shop' => [
            'class' => 'dvizh\shop\Module',
            'adminRoles' => ['superadmin', 'admin', 'administrator', 'user', 'guest'],
            'defaultPriceType' => 1, //Цена по умолчанию]
        ],
        'filter' => [
            'class' => 'dvizh\filter\Module',
            'adminRoles' => ['administrator'],
            'relationFieldName' => 'category_id',
            'relationFieldValues' =>
                function() {
                    return \dvizh\shop\models\Category::buildTextTree();
                },
        ],
        'field' => [
            'class' => 'dvizh\field\Module',
            'relationModels' => [
                'dvizh\shop\models\Product' => 'Продукты',
                'dvizh\shop\models\Category' => 'Категории',
                'dvizh\shop\models\Producer' => 'Производители',
            ],
            'adminRoles' => ['administrator'],
        ],
        'relations' => [
            'class' => 'dvizh\relations\Module',
            'fields' => ['code'],
        ],
        'gallery' => [
            'class' => 'dvizh\gallery\Module',
            'imagesStorePath' => dirname(dirname(__DIR__)).'/storage/web/images/store',
            'imagesCachePath' => dirname(dirname(__DIR__)).'/storage/web/images/cache',
            'graphicsLibrary' => 'GD',
            'placeHolderPath' => dirname(dirname(__DIR__)).'/storage/web/images/placeHolder.png',
        ],
        'utility' => [
            'class' => 'c006\utility\migration\Module',
        ],
        'order' => [
            'class' => 'dvizh\order\Module',
            //...
            'as order_filling' => '\common\aspects\OrderFilling',
        ],
    ],
	
];
