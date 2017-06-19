<?php
namespace frontend\themes\web6themes\view\layouts;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Контакти</h3>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Avenue, 4th block, <span>New York City.</span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+0000 000 000</li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Інформація</h3>
                <ul class="info">
                    <li><a href="about.html">Про нас</a></li>
                    <li><a href="mail.html">Контакти</a></li>
                    <li><a href="codes.html">Скорочені коди</a></li>
                    <li><a href="faq.html">FAQ's</a></li>
                    <li><a href="products.html">Спеціальні пропозиції</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Категорія</h3>
                <ul class="info">
                    <li><a href="products.html">Мобільні телефони</a></li>
                    <li><a href="products1.html">Ноутбуки</a></li>
                    <li><a href="products.html">Очисні фільтри</a></li>
                    <li><a href="products1.html">Предмети одягу</a></li>
                    <li><a href="products2.html">Кухня</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Профіль</h3>
                <ul class="info">
                    <li><a href="index.html">Домашня сторінка</a></li>
                    <li><a href="products.html">Сьогоднішні пропозиції</a></li>
                </ul>
                <h4>Ми в соціальних мережах:</h4>
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
<!-- //footer -->


/**
 * Created by PhpStorm.
 * User: AiZsARgS
 * Date: 5/24/2017
 * Time: 10:33 AM
 */