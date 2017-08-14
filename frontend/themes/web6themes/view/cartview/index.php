<?php
use dvizh\cart\widgets\DeleteButton;
use dvizh\cart\widgets\TruncateButton;
use dvizh\cart\widgets\ChangeCount;
use dvizh\cart\widgets\CartInformer;
use dvizh\cart\widgets\ChangeOptions;
use dvizh\order\widgets\OrderForm;
use dvizh\shop\models\Product;


$this->title = yii::t('cart', 'Cart');
?>

<div class="cart container">
    <br>
    <h1><?= yii::t('cart', 'Cart'); ?></h1>
    <?php foreach($elements as $element) { ?>
        <?php $model = Product::findOne($element->item_id);; ?>
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <strong><?=$element->getModel()->getCartName();?> (<?=$element->getModel()->getCartPrice();?> р.)</strong>
                <?=ChangeOptions::widget(['model' => $element, 'type' => 'radio']); ?>
            </div>
            <div class="col-lg-4 col-xs-4">
                <?=ChangeCount::widget(['model' => $element]);?>
            </div>
            <div class="col-lg-2 col-xs-2">
                <?=DeleteButton::widget(['model' => $element, 'lineSelector' => '.row']);?>
            </div>
        </div>

        <!--зображення        -->
        <?php
        $images = $model->getImages();
            $image = $model->getImage()->getUrl('150x150');
            echo "<img src=\"{$image}\" class=\"thumb\" />"; ?>
        <!--/зображення        -->

    <?php } ?>
    <div class="total">
        <?=CartInformer::widget(['htmlTag' => 'h3']); ?>
    </div>
    <br><br>
        <?=OrderForm::widget();?>
</div>
