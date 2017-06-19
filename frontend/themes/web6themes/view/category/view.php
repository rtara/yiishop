<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 19.06.2017
 * Time: 3:37
 */

use dvizh\cart\widgets\BuyButton;
use dvizh\shop\models\Category;


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
                                        'text' => 'Замовити',
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
