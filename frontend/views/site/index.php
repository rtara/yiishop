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

<!DOCTYPE html>


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
                    <?php foreach ($products as $p)?>
                    <div class="col-sm-2 col-md-3">
                        <div class="thumbnail">
                            <img src="..." alt="...">
                            <div class="caption">
                                <h3> label</h3>
                                <p>...</p>
                                <p><a href="#" class="btn btn-primary" role="button">Button</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>