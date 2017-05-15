<?php
 namespace frontend\themes\web6themes;

 use yii\web\AssetBundle;


 class ThemesAsset extends AssetBundle
 {
     public $sourcePath = '@frontend/themes/web6themes/assets';
     public $css = [
         'css/bootstrap.css',
         'css/style.css',
     ];
     public $js = [];
     public $depends = [
         'yii\web\YiiAsset',
         'yii\bootstrap\BootstrapAsset',
     ];

 }
/**
 * Created by PhpStorm.
 * User: AiZsARgS
 * Date: 5/15/2017
 * Time: 2:47 AM
 */