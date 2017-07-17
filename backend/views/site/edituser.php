<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'edituser';
?>


<input type="string" class="btn btn-default" value="<?= $user->username?>">
<input type="string" class="btn btn-default" value="<?= $user->email?>">
<input type="string" class="btn btn-default" value="<?= $user->group?>">
<input type="string" class="btn btn-default" value="<?= Yii::$app->formatter->asDate($user->created_at , 'long')?>">
<button type="submit" class="btn btn-primary" > Submit</button>


