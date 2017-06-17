<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\ThemesAsset;
use common\widgets\Alert;
use dvizh\cart\widgets\CartInformer;
use frontend\themes\web6themes\view\layouts\footer;
use dvizh\shop\models\Category;
use frontend\components\widgets\MyNav;
use frontend\components\widgets\AdvDropdown;


ThemesAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Electronic Store" />
    <!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>-->
    <!-- //for-mobile-apps -->

    <!-- web fonts -->
    <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- //web fonts -->


</head>

<body>
<?php $this->beginBody() ?>
<!-- header modal -->
<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
                <h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
            </div>
            <div class="modal-body modal-body-sub">
                <div class="row">
                    <div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
                        <div class="sap_tabs">
                            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                                <ul>
                                    <li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
                                    <li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
                                </ul>
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                    <div class="facts">
                                        <div class="register">
                                            <form action="#" method="post">
                                                <input name="Email" placeholder="Email Address" type="text" required="">
                                                <input name="Password" placeholder="Password" type="password" required="">
                                                <div class="sign-up">
                                                    <input type="submit" value="Sign in"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
                                    <div class="facts">
                                        <div class="register">
                                            <form action="#" method="post">
                                                <input placeholder="Name" name="Name" type="text" required="">
                                                <input placeholder="Email Address" name="Email" type="email" required="">
                                                <input placeholder="Password" name="Password" type="password" required="">
                                                <input placeholder="Confirm Password" name="Password" type="password" required="">
                                                <div class="sign-up">
                                                    <input type="submit" value="Create Account"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="OR" class="hidden-xs">OR</div>
                    </div>
                    <div class="col-md-4 modal_body_right modal_body_right1">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                                <h3 class="other-nw">Sign in with</h3>
                            </div>
                            <div class="col-md-12">
                                <ul class="social">
                                    <li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
                                    <li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
                                    <li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
                                    <li class="social_behance"><a href="#" class="entypo-behance"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header modal -->
<!-- header -->
    <div class="header" id="home1">
           <div class="container">
               <div class="w3l_login">
                   <a href="#" data-toggle="modal" data-target="#myModal88">
                       <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                   </a>
               </div>
               <div class="w3l_logo">
                   <h1>
                       <a href="index.html">Electronic Store<span>Your stores. Your place.</span>
                       </a>
                   </h1>
               </div>
               <div class="search">
                   <input class="search_box" type="checkbox" id="search_box">
                   <label class="icon-search" for="search_box">
                       <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                   </label>
                   <div class="search_form">
                       <form action="#" method="post">
                           <input type="text" name="Search" placeholder="Search...">
                           <input type="submit" value="Send">
                       </form>
                   </div>
               </div>
               <div class="cart cart box_1">
                   <form action="#" method="post" class="last">
                       <input type="hidden" name="cmd" value="_cart" />
                       <input type="hidden" name="display" value="1" />
                       <button class="w3view-cart" type="submit" name="submit" value="">
                           <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                       </button>
                   </form>
               </div>
           </div>
       </div>
<!-- //header -->
<!-- navigation -->
<div class="navigation">
    <div class="container">
<?php
NavBar::begin([
    'options' => [
        'class' => 'navbar-default',
    ],
]);
?>

<?php $menuItems[] = ['label' => 'Home', 'url' => ['/site/index']]; ?>
<?php
$categories = Category::find()->indexBy('id')->asArray()->all();
$categoryItems = AdvDropdown::run($categories);

?>
<?php $menuItems[] = ['label' => 'Products', 'items' => $categoryItems]; ?>
<?php $menuItems[] = ['label' => 'Cart' , 'url' => ['/cart']]; ?>


<?php
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => $menuItems,
    'dropdownClass' => 'frontend\components\widgets\MyDropdown',
]);
NavBar::end();
?>
    </div>
</div>

    <?= $content ?>


<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Contact</h3>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Avenue, 4th block, <span>New York City.</span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+0000 000 000</li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Information</h3>
                <ul class="info">
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="mail.html">Contact Us</a></li>
                    <li><a href="codes.html">Short Codes</a></li>
                    <li><a href="faq.html">FAQ's</a></li>
                    <li><a href="products.html">Special Products</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Category</h3>
                <ul class="info">
                    <li><a href="products.html">Mobiles</a></li>
                    <li><a href="products1.html">Laptops</a></li>
                    <li><a href="products.html">Purifiers</a></li>
                    <li><a href="products1.html">Wearables</a></li>
                    <li><a href="products2.html">Kitchen</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Profile</h3>
                <ul class="info">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Today's Deals</a></li>
                </ul>
                <h4>Follow Us</h4>
                <div class="agileits_social_button">
                    <ul>
                        <li><a href="#" class="facebook"> </a></li>
                        <li><a href="#" class="twitter"> </a></li>
                        <li><a href="#" class="google"> </a></li>
                        <li><a href="#" class="pinterest"> </a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="footer-copy1">
            <div class="footer-copy-pos">
                <a href="#home1" class="scroll"><img src="images/arrow.png" alt=" " class="img-responsive" /></a>
            </div>
        </div>
        <div class="container">
            <p class="pull-right">Design by web6-store <?= date('Y') ?></p>
            <p class="pull-left">&copy; 2017 Electronic Store.</p>
        </div>
    </div>
</div>
<!-- //footer z-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
