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
	<div class="row">
		<div class="col-lg-8 col-xs-8"><strong>Name</strong></div>
		<div class="col-lg-1 col-xs-1"><strong>Price</strong></div>
		<div class="col-lg-1 col-xs-1"><strong>Quantity</strong></div>
		<div class="col-lg-1 col-xs-1"><strong>Total</strong></div>
		<div class="col-lg-1 col-xs-1"><strong>Refuse</strong></div>
	
	</div>
    <?php foreach($elements as $element) { ?>
        <?php $model = Product::findOne($element->item_id);; ?>
		
        <div class="row">
            <div class="col-lg-8 col-xs-8">
				<!--зображення        -->
					<?php
					$images = $model->getImages();
						$image = $model->getImage()->getUrl('50x50');
						echo "<img src=\"{$image}\" class=\"thumb\" />"; ?>
					<!--/зображення        -->
                <strong><?=$element->getModel()->getCartName();?> (<?=$element->getModel()->getCartPrice();?> р.)</strong>
                <?=ChangeOptions::widget(['model' => $element, 'type' => 'radio']); ?>
            </div>
			<div class="col-lg-1 col-xs-1 ">
                <?=$element->price?>
            </div>
            <div class="col-lg-1 col-xs-1">
                <?=ChangeCount::widget(['model' => $element]);?>
            </div>
            <div class="col-lg-1 col-xs-1 dvizh-cart-element-cost<?=$element->id?>">
                <?=$element->count *$element->price ?>
            </div>
			<div class="col-lg-1 col-xs-1">
                <?=DeleteButton::widget(['model' => $element, 'lineSelector' => '.row']);?>
            </div>
        </div>


    <?php } ?>
    <div class="total">
        <?=CartInformer::widget(['htmlTag' => 'h3']); ?>
    </div>
    <br><br>
        <?=OrderForm::widget();?>
</div>
