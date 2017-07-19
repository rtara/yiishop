<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 28.06.2017
 * Time: 20:29
 */
use yii\helpers\Html;
use dvizh\cart\widgets\BuyButton;
?>

<div class="panel panel-default agile_ecommerce_tab_left mobiles_grid">
    <div class="panel-body">
        <?php // iterl_todo : insert image for product without actual image; ?>
        <?php $image = $model->getImage()->getUrl('200x200');
        echo "<img src=\"{$image}\" class=\"thumb img-responsive\" />";
        ?>
    </div>
    <div class="panel-footer">
        <div class="caption">
            <?php /* iterl_todo : insert url to view individual item card */ ?>
            <div><h5><?= Html::a($model->name, ['product/view', 'id' => $model->id] )?></h5></div>
        </div>
        <div class="simpleCart_shelfItem">
            <p>
                <?php
                foreach ($model->prices as $price) {
                    echo
                        "<span>" . $price->price_old . "</span>" .
                        "<i class='item_price'>" . $price->price . "</i>";
                }
                ?>
            </p>
            <div>
                <?= BuyButton::widget([
                    'model' => $model,
                    'text' => 'Замовити',
                    'htmlTag' => 'button',
                    'cssClass' => 'w3ls-cart'
                ]) ?>
            </div>
        </div>
    </div>
</div>

<?php // iterl_todo : add if statement to signify of empty category; ?>
