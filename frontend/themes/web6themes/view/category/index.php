<?php

use frontend\components\widgets\CategoryDropdown;
use yii\bootstrap\Nav;
use yii\grid\GridView;

?>

<?php

echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => CategoryDropdown::run(),
    'dropdownClass' => 'frontend\components\widgets\MyDropdown',
]);


echo GridView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \kop\y2sp\ScrollPager::className(),
        'container' => '.grid-view tbody',
        'item' => 'tr',
        'paginationSelector' => '.grid-view .pagination',
        'eventOnRendered' => 'function() {window.setTimeout(function() {$(window).scroll();}, 500);}',
        'triggerTemplate' => '<tr class="ias-trigger"><td colspan="100%" style="text-align: center"><a style="cursor: pointer">{text}</a></td></tr>',
    ],
]);

// iterl_todo : add filter by attributes of products

?>
