<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 19.06.2017
 * Time: 3:37
 */

use dvizh\cart\widgets\BuyButton;
use dvizh\shop\models\Category;
use frontend\components\widgets\MyBuyButton;


$category = Category::findOne($id);

?>

<div class="container">
    <div class="body-content">
        <div class="row">
            <br>
            <div class="container">
                <h1><?= $category->name; ?></h1>
            </div>
            <br>
            <?php $i=0; foreach ($products as $p) { ?>
                <div class="col-sm-2 col-md-3">
                    <div class="thumbnail">
                        <?php $image = $p->getImage()->getUrl('150x150');
                        echo "<img src=\"{$image}\" class=\"thumb\" />";
                        ?>
                        <div class="caption">
                            <div><h4><?= $p->name ?></h4></div>
                            <div>
                                <h4>
                                    <?php
                                    foreach ($p->prices as $price) {
                                        echo $price->price;
                                    }
                                    ?>
                                    <?php /* Выведет кнопку покупки */ ?>
                                    <?= \yii\bootstrap\Button::widget([
                                        'label' => MyBuyButton::widget([
                                            'model' => $p,
                                            'text' => 'Замовити',
                                            'htmlTag' => 'a',
                                            'cssClass' => 'custom_class'
                                        ]),
                                        'options' => ['class' => 'w3ls-cart'],
                                        'encodeLabel' => false
                                    ])
                                    ?>
                                </h4>
                            </div>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> </p>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                <?php if ($i%3==0): ?>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
