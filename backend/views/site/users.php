<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<table class="table"> 
	<thead class="thead-inverse">
		<tr>
		  <th>Name</th>
		  <th>Email</th>
		  <th>Group</th>
		  <th>Registration</th>
		  <th>Password</th>
		  <th>Action</th>
		</tr>
	  </thead>
	<tbody>
	<?php foreach($users as $user){ ?>
	<tr id="user_<?= $user->id?>">
		<td><input type="string" class="btn btn-default" value="<?= $user->username?>"></td>
		<td><input type="string" class="btn btn-default" value="<?= $user->email?>"></td>
		<td><input type="string" class="btn btn-default" value="<?= $user->group?>"></td>
		<td><input type="string" class="btn btn-default" value="<?= Yii::$app->formatter->asDate($user->created_at , 'long')?>"></td>
		<td><input type="string" class="btn btn-default"></td>
		<td> 
			<a href="<?=Url::to(['site/edituser', 'id' => $user->id])?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
			<a href="<?=Url::to(['site/deleteuser', 'id' => $user->id])?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
		</td>
	</tr>
	<? } ?>
	</tbody>
</table>
<?php echo LinkPager::widget([
    'pagination' => $pagination,
]);
?>

