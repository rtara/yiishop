<?php
 namespace backend\thems\backendthemes;

 use yii\web\AssetBundle;


 class ThemesAsset extends AssetBundle
 {
     public $sourcePath = '@backend/themes/backendthemes/assets';
     public $css = [];
     public $js = [];
     public $depends = [
         'yii\web\YiiAsset',
         'yii\bootstrap\BootstrapAsset',
     ];

 }

/**
 * Created by PhpStorm.
 * User: AiZsARgS
 * Date: 5/9/2017
 * Time: 1:33 PM
 */