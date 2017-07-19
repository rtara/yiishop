<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 19.06.2017
 * Time: 3:37
 */

use frontend\components\widgets\MyBuyButton;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\components\widgets\MyListView;
use frontend\components\widgets\MyScrollPager;

$this->params['breadcrumbs'][] = ['label' => $supCategory->name, 'url' => ['#']];
$this->params['breadcrumbs'][] = ['label' => $category->name];

echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'homeLink' => [
        'label' => Html::tag('span','' , ['class' => 'glyphicon glyphicon-home']),
        'url' => \yii\helpers\Url::home(),
        'encode' => false
    ],
]) ?>
<?php  // iterl_todo : add signs 'popular' and 'new'  ?>

<div class="container">
    <div class="body-content">
            <br>
            <div class="container">
                <h1><?= $category->name; ?></h1>
            </div>
            <br>

        <div class="w3ls_mobiles_grid_right" style="border: 1px">
            <div class="w3ls_mobiles_grid_right_grid3 row-eq-height">
                <?= MyListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' =>  '_product',
                    'options' => [
                        'class' => 'list-view w3ls_mobiles_grid_right_grid3',
                        'style' => 'width: 100%'
                    ],
                    'itemOptions' => ['class' => 'item col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles'],
                    'pager' => [
                        'class' => MyScrollPager::className(),
                        'paginationSelector' => '.list-view .null',
                        'triggerTemplate' => '<div class="panel"><a style="cursor: pointer">{text}</a></div>',
                    ]
                ]) ; ?>
            </div>
        </div>
    </div>
</div>





