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
	<div class="row" style="background:#C0C0C0">
		<div class="col-lg-8 col-xs-8" style="text-align: center;"><strong>Name</strong></div>
		<div class="col-lg-1 col-xs-1" style="text-align: center;"><strong>Price</strong></div>
		<div class="col-lg-1 col-xs-1" style="text-align: center;"><strong>Quantity</strong></div>
		<div class="col-lg-1 col-xs-1" style="text-align: center;"><strong>Subtotal</strong></div>
		<div class="col-lg-1 col-xs-1" style="text-align: center;"><strong>Refuse</strong></div>
	
	</div>
    <?php foreach($elements as $element) { ?>
        <?php $model = Product::findOne($element->item_id);; ?>
		
        <div class="row" style="border: solid 0.5px #C0C0C0">
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
			<div class="col-lg-1 col-xs-1" style="padding:15px; text-align: center;">
                <?=$element->price?>
            </div>
            <div class="col-lg-1 col-xs-1" style="padding:15px; text-align: center;">
                <?=ChangeCount::widget(['model' => $element]);?>
            </div>
            <div class="col-lg-1 col-xs-1 dvizh-cart-element-cost<?=$element->id?>" style="padding:15px; text-align: center;">
                <?=$element->count *$element->price ?>
            </div>
			<div class="col-lg-1 col-xs-1" style="padding:15px; text-align: center;">
                <?=DeleteButton::widget(['model' => $element, 'lineSelector' => '.row']);?>
            </div>
        </div>


    <?php } ?>
	<div class="row" style="background:#C0C0C0">
		<div class="col-lg-9 col-xs-9"></div>
		<div class="col-lg-3 col-xs-3">
			<div class="total">
				 <?=CartInformer::widget(['htmlTag' => 'h3']); ?>
			</div>
		</div>
	</div>
	<br><br>
		<?=OrderForm::widget();?>
</div>
