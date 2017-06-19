<?php

use frontend\components\widgets\CategoryDropdown;
use yii\bootstrap\Nav;

?>

<!--<div class="body-content">-->
<!--        <div class="row">-->
<!--            <h1>Товари</h1>-->
<!--            --><?php //foreach ($products as $p) { ?>
<!--    <div class="col-sm-2 col-md-3">-->
<!--        <div class="thumbnail">-->
<!--            --><?php //$image = $p->getImage()->getUrl('150x150');
//            echo "<img src=\"{$image}\" class=\"thumb\" />";
//            ?>
<!--            <div class="caption">-->
<!--                <div><h3>--><?//= $p->name ?><!--</h3></div>-->
<!--                <div>-->
<!--                    <h4>-->
<!--                        --><?php
//                        foreach ($p->prices as $price) {
//                            echo $price->price;
//                        }
//                        ?>
<!--                        --><?php ///* Выведет кнопку покупки */ ?>
<!--                        --><?//= BuyButton::widget([
//                            'model' => $p,
//                            'text' => 'Замовити',
//                            'htmlTag' => 'a',
//                            'cssClass' => 'custom_class'
//                        ]) ?>
<!--                    </h4>-->
<!--                </div>-->
<!--                <p><a href="#" class="btn btn-primary" role="button">Button</a> </p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<?php //} ?>
<!--</div>-->
<!--</div>-->

<?php

echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => CategoryDropdown::run(),
    'dropdownClass' => 'frontend\components\widgets\MyDropdown',
]);


?>
