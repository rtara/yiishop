<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;?>
	<div class="row form-inline">
		<div class="form-group col-xs-2"><label>Name</label></div>
		<div class="form-group col-xs-2"><label> Email</label ></div>
		<div class="form-group col-xs-2"><label>Group</label></div>
		<div class="form-group col-xs-2"><label>Registration</label></div>
		<div class="form-group col-xs-2"><label>Password</label></div>
		<div class="form-group col-xs-2"><label>Action</label></div>
	</div>	

	<?php foreach($users as $user){ ?>
	<div class="row">
		<form  action="<?=Url::to(['site/edituser', 'id' => $user->id])?>" class="form-inline" method="post">
		  <div class="form-group col-xs-2 ">
			<input type="text" class="form-control" name="username" placeholder="Name" value="<?= $user->username?>">
		  </div>
		  <div class="form-group col-xs-2">
			<input type="email" class="form-control" name="email" placeholder="email" value="<?= $user->email?>">
		  </div>
		  <div class="form-group col-xs-2">
			<input type="text" class="form-control" name="group" placeholder="group" value="<?= $user->group?>">
		  </div>
		  <div class="form-group col-xs-2">
			<input type="text" class="form-control" name="created" placeholder="created" value="<?= Yii::$app->formatter->asDate($user->created_at , 'long')?>" readonly></button>
		  </div>
		  <div class="form-group col-xs-2">
			<input type="password" class="form-control" name="password_hash" placeholder="Password" value="">
		  </div>
		  <div class="form-group col-xs-2">
			<button type="submit"  class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
			<a href="<?=Url::to(['site/deleteuser', 'id' => $user->id])?>" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
		  </div>
		  <input type="hidden" name="_csrf-backend" value="<?=Yii::$app->request->getCsrfToken()?>" />
		</form>
	</div>
	<? } ?>



  <!-- Modal -->
  <button type="hidden" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="delmodal">Open Small Modal</button>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete the user?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		   <a href="#" class="btn btn-default" id="okbtn" >OK</a>
        </div>
      </div>
    </div>
  </div>


<?php echo LinkPager::widget([
    'pagination' => $pagination,
]);
?>

