<?php
return [
    'modules' => [
        //..
        'shop' => [
            'class' => 'pistol88\shop\Module',
            'adminRoles' => [],
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
    ],

    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
            'fileStorage' => [
                'class' => '\trntv\filekit\Storage',
                'baseUrl' => '@storageUrl/source',
                'filesystem'=> function() {
                    $adapter = new \League\Flysystem\Adapter\Local(dirname(dirname(__DIR__)).'/frontend/web/images/source');
                    return new League\Flysystem\Filesystem($adapter);
                },
            ],
        'cache' => [
            'class' => 'yii\caching\FileCache', 
        ],
    ]
];
