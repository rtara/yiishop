<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'authManager' => [
            'class' => 'yii\rbac\PhpManager',
			'defaultRoles' => ['superadmin', 'admin', 'administrator', 'user', 'guest'],
        ],
    ],
	'modules' => [
        //..
        'shop' => [
            'class' => 'pistol88\shop\Module',
            'adminRoles' => ['administrator', 'superadmin', 'admin'],
        ],
        'filter' => [
            'class' => 'pistol88\filter\Module',
            'adminRoles' => ['administrator'],
            'relationFieldName' => 'category_id',
            'relationFieldValues' =>
                function() {
                    return \pistol88\shop\models\Category::buildTextTree();
                },
        ],
        'field' => [
            'class' => 'pistol88\field\Module',
            'relationModels' => [
                'pistol88\shop\models\Product' => 'Продукты',
                'pistol88\shop\models\Category' => 'Категории',
                'pistol88\shop\models\Producer' => 'Производители',
            ],
            'adminRoles' => ['administrator'],
        ],
        'relations' => [
            'class' => 'pistol88\relations\Module',
            'fields' => ['code'],
        ],
        'gallery' => [
            'class' => 'pistol88\gallery\Module',
            'imagesStorePath' => dirname(dirname(__DIR__)).'/storage/web/images/store',
            'imagesCachePath' => dirname(dirname(__DIR__)).'/storage/web/images/cache',
            'graphicsLibrary' => 'GD',
            'placeHolderPath' => dirname(dirname(__DIR__)).'/storage/web/images/placeHolder.png',
        ],
        //..
    ]
];
