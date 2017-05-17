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
	
];
