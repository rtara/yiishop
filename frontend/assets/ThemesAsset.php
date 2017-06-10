<?php
// namespace frontend\themes\web6themes;
namespace frontend\assets;

use yii\web\AssetBundle;


 class ThemesAsset extends AssetBundle
 {
     public $sourcePath = '@frontend/themes/web6themes/assets';
     public $css = [
//         'css/bootstrap.css',
         'css/style.css',
         'css/font-awesome.css',
         'css/flexslider.css',
         'css/jquery.countdown.css',
         'css/fasthover.css',
         'css/popuo-box.css',
         'css/',

     ];
     public $js = [
//         'js/jquery.min.js',
//         'js/bootstrap-3.1.1.min.js',
         'js/easyResponsiveTabs.js',
         'js/imagezoom.js',
         'js/jquery.countdown.js',
         'js/jquery.flexisel.js',
         'js/jquery.flexslider.js',
         'js/jquery.magnific-popup.js',

         'js/jquery.wmuSlider.js',
         'js/minicart.js',
         'js/script.js',
     ];
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