<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\LoginForm;
use frontend\models\SignupForm;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\ThemesAsset;
use common\widgets\Alert;
use dvizh\cart\widgets\CartInformer;
use dvizh\shop\models\Category;
use frontend\components\widgets\CategoryDropdown;
use dektrium\user\models\User;
use yii\authclient\OAuths;

\dvizh\cart\assets\WidgetAsset::register($this);
ThemesAsset::register($this);

$model=new SignupForm();
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" xmlns="http://www.w3.org/1999/html">
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
                                            <div class="site-login">
                                                 <div class="row">
                                                    <div class="col-lg-5">
                                                        <?php \dektrium\user\widgets\Login::begin()?>
                                                        <?php \dektrium\user\widgets\Login::end()?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
                                    <div class="facts">
                                        <div class="register">
                                            <?php $form = ActiveForm::begin([
                                                'id' => 'registration-form',
                                                //'enableAjaxValidation' => true,
                                                'enableClientValidation' => false,
                                            ]); ?>

                                            <?= $form->field($model, 'email') ?>

                                            <?= $form->field($model, 'username') ?>

                                            <?php //if ($module->enableGeneratingPassword == false): ?>
                                                <?= $form->field($model, 'password')->passwordInput() ?>
                                            <?php //endif ?>

                                            <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    </div>
                                    <p class="text-center">
                                        <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
                                    </p>
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
                                <div class="fb-login-button" data-max-rows="1" data-size="small" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="true"></div>
                                <ul class="social">
                                    <li class="social_facebook"><a href="https://www.facebook.com" class="entypo-facebook"></a></li>
                                    <li class="social_dribbble"><a href="https://accounts.google.com" class="entypo-dribbble"></a></li>
                                    <li class="social_twitter"><a href="https://twitter.com" class="entypo-twitter"></a></li>
                                    <li class="social_behance"><a href="https://pinterest.com" class="entypo-behance"></a></li>
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
               <div>
                   <?php
                   //$menuItems[] = '<li>'
                   //    . Html::beginForm(['/site/logout'], 'post')
                   //    . Html::submitButton(
                   //        'Logout (' . Yii::$app->user->identity->username . ')',
                   //        ['class' => 'btn btn-link logout']
                   //    );
                   //?>
               </div>
<!--                   <div id="google_translate_element">-->
<!--                       <script type="text/javascript">-->
<!--                           function googleTranslateElementInit() {-->
<!--                               new google.translate.TranslateElement({pageLanguage: 'uk', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');-->
<!--                           }-->
<!--                       </script>-->
<!--                       <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
<!--                   </div>-->
                   <div class="w3l_logo">
                       <h1>
                           <a href="index.php">Electronic Store<span>Your stores. Your place.</span>
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

                $menuItems[] = ['label' => 'PRODUCTS', 'items' => CategoryDropdown::run()];
                $menuItems[] = ['label' => 'BRANDS' , ];
                $menuItems[] = ['label' => 'DEALS' , ];
                $menuItems[] = ['label' => 'SERVICES' , ];

                if (Yii::$app->user->isGuest) {
                    //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                    //$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                } else {
                    $menuItems[] = '<li>'
                        . Html::beginForm(['/user/security/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
                    $menuItems[] = '<li>'
                        . Html::beginForm(['/user/settings/profile'], 'post')
                        . Html::submitButton(
                            'Account',
                            ['class' => 'btn btn-link logout ']
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
                        <li><a href="facebook.com" class="facebook"> </a></li>
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
