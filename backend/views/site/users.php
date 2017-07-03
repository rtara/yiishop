<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<table class="table"> 
	<thead class="thead-inverse">
		<tr>
		  <th>Name</th>
		  <th>Email</th>
		  <th>Group</th>
		  <th>Registration</th>
		  <th>Action</th>
		</tr>
	  </thead>
	<tbody>
	<?php foreach($users as $user){ ?>
	<tr>
		<td><?= $user->username?></td>
		<td><?= $user->email?></td>
		<td><?= $user->group?></td>
		<td><?= Yii::$app->formatter->asDate($user->created_at , 'long')?></td>
		<td> <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a><a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
	</tr>
	<? } ?>
	</tbody>
</table>
<?php echo LinkPager::widget([
    'pagination' => $pagination,
]);
?>

