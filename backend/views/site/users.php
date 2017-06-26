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
<table> 
	<tbody>
	<?php foreach($users as $user){ ?>
	<tr>
		<td><?= $user->username?></td>
		<td><?= $user->email?></td>
		<td><?= $user->group?></td>
	</tr>
	<? } ?>
	</tbody>
</table>
<?php echo LinkPager::widget([
    'pagination' => $pagination,
]);
?>

