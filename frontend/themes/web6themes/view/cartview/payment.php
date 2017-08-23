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

<div class="container" style="margin-top:10px;">
<h3>Thank you for your purchase.</h3>
<h4><p>You have been sent a message to the mail about a successful order of the product. 
During the working day, our manager will contact you to confirm the order. 
<strong>Your order number is <?= $_GET["id"]?> </strong></h4>  
</div>
