<?php


use yii\helpers\Html;
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