<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use dvizh\cart\widgets\BuyButton;
use dvizh\cart\widgets\TruncateButton;
use dvizh\cart\widgets\CartInformer;
use dvizh\cart\widgets\ElementsList;
use dvizh\cart\widgets\DeleteButton;
use dvizh\cart\widgets\ChangeCount;
use dvizh\cart\widgets\ChangeOptions;
use dvizh\cart\widgets;


$this->title = Yii::$app->name;
?>
<body>
    <div class="site-index">

        <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>...</p>
            <p></p>
        </div>
        <div class="body-content">
            <div class="row">
                <h1>Products</h1>
                    <?php foreach ($products as $p) { ?>
                        <div class="col-sm-2 col-md-3">
                            <div class="thumbnail">
                                <?php $image = $p->getImage()->getUrl('150x150');
                                echo "<img src=\"{$image}\" class=\"thumb\" />";
                                ?>
                                <div class="caption">
                                    <div><h3><?= $p->name ?></h3></div>
                                    <div>
                                        <h4>
                                            <?php
                                                foreach ($p->prices as $price) {
                                                    echo $price->price;
                                                }
                                            ?>
                                            <?php /* Выведет кнопку покупки */ ?>
                                            <?= BuyButton::widget([
                                                'model' => $p,
                                                'text' => 'Заказать',
                                                'htmlTag' => 'a',
                                                'cssClass' => 'custom_class'
                                            ]) ?>
                                        </h4>
                                    </div>
                                    <p><a href="#" class="btn btn-primary" role="button">Button</a> </p>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>