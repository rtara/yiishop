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
use dvizh\shop\models\Category;
use frontend\components\widgets\CategoryDropdown;

\dvizh\cart\assets\WidgetAsset::register($this);
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                   <div id="google_translate_element">
                       <script type="text/javascript">
                           function googleTranslateElementInit() {
                               new google.translate.TranslateElement({pageLanguage: 'uk', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                           }
                       </script>
                       <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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
<!--                   <div class="cart cart box_1">-->
<!--                   <form action="#" method="post" class="last">-->
<!--                       <input type="hidden" name="cmd" value="_cart" />-->
<!--                       <input type="hidden" name="display" value="1" />-->
                       <button class="w3view-cart" data-toggle="modal" data-target="#cart-modal">
                           <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                       </button>
                        <?= \frontend\components\widgets\CartQuantity::widget([]) ; ?>
<!--                   </form>-->
<!--                   </div>-->

<!--               <button id="foo" data-toggle="modal" data-target="#cart-modal">foooooo</button>-->

               <div id="cart-modal" class="modal" role="dialog">
                   <div class="modal-dialog">
                       <div class="modal-content">
                           <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                               <?= \dvizh\cart\widgets\ElementsList::widget(['elementView' => '@app/themes/web6themes/view/layouts/_cartRender.php']) ; ?>
                           </div>
                           <div class="modal-footer">
                               <?= CartInformer::widget([]) ; ?>
                           </div>
                       </div>
                   </div>
               </div>

<!--               <div id="w3lssbmincart" class="modal fade">-->
<!--                   <form method="post">-->
<!--                       <button type="button" class="sbmincart-closer">&times;</button>-->
<!--                       <ul>-->
<!--                           <li class="sbmincart-item">-->
<!--                               <div class="sbmincart-details-name">-->
<!--                                   <ul class="sbmincart-attributes">-->
<!--                                   </ul>-->
<!--                               </div>-->
<!--                               <div class="sbmincart-details-quantity">-->
<!--                                   <input class="sbmincart-quantity" data-sbmincart-idx="<%= i %>" name="quantity_<%= idx %>" type="text" pattern="[0-9]*" value="<%= items[i].get("quantity")>-->
<!--                               </div>-->
<!--                               <div class="sbmincart-details-remove">-->
<!--                                   <button type="button" class="sbmincart-remove" data-sbmincart-idx="<%= i %>">&times;</button>-->
<!--                               </div>-->
<!--                               <div class="sbmincart-details-price">-->
<!--                                   <span class="sbmincart-price"></span>-->
<!--                               </div>-->
<!--                               <input type="hidden" name="w3ls_item_<%= idx %>" value="<%= items[i].get("w3ls_item") %>" />-->
<!--                               <input type="hidden" name="amount_<%= idx %>" value="<%= items[i].amount() %>" />-->
<!--                               <input type="hidden" name="shipping_<%= idx %>" value="<%= items[i].get("shipping") %>" />-->
<!--                               <input type="hidden" name="shipping2_<%= idx %>" value="<%= items[i].get("shipping2") %>" />-->
<!--                           </li>-->
<!--                       </ul>-->
<!--                       <div class="sbmincart-footer">-->
<!--                           <div class="sbmincart-subtotal">-->
<!---->
<!--                           </div>-->
<!--                           <button class="sbmincart-submit" type="submit" data-sbmincart-alt="<%= config.strings.buttonAlt %>"></button>-->
<!--                       </div>-->
<!--                       <input type="hidden" name="cmd" value="_cart" />-->
<!--                       <input type="hidden" name="upload" value="1" />-->
<!--                       <input type="hidden" name="<%= key %>" value="<%= settings[key] %>" />-->
<!--                   </form>-->
<!--               </div>-->

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

                $menuItems[] = ['label' => 'Home', 'url' => ['/site/index']];
                // iterl_todo : add to category dropdown a quantifier of available products under a category
                $menuItems[] = ['label' => 'Products', 'items' => CategoryDropdown::run()];
                $menuItems[] = ['label' => 'Cart' , 'url' => ['/cart']];

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
<!-- //top-brands -->
<!-- newsletter -->
<!--    <div class="newsletter">-->
<!--    <div class="container">-->
<!--        <div class="col-md-6 w3agile_newsletter_left">-->
<!--            <h3>Newsletter</h3>-->
<!--            <p>Excepteur sint occaecat cupidatat non proident, sunt.</p>-->
<!--</div>-->
<!--<div class="col-md-6 w3agile_newsletter_right">-->
<!--            <form action="#" method="post">-->
<!--                <input type="email" name="Email" placeholder="Email" required="">-->
<!--                <input type="submit" value="" />-->
<!--            </form>-->
<!--        </div>-->
<!--        <div class="clearfix"> </div>-->
<!--    </div>-->
<!--</div>-->
<!-- //newsletter -->
<!--        --><?//= \dvizh\cart\widgets\ElementsList::widget() ; ?>


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
                <a href="#home1" class="scroll"><img src="/images/arrow.png" alt=" " class="img-responsive" /></a>
            </div>
        </div>
        <div class="container">
            <p class="pull-right">Design by web6-store <?= date('Y') ?></p>
            <p class="pull-left">&copy; 2017 Electronic Store.</p>
        </div>
    </div>
</div>
<!-- //footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
