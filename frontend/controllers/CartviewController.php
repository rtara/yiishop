<?php
namespace frontend\controllers;

use dvizh\cart\controllers\DefaultController;
use dvizh\cart\models\Cart;
use dvizh\shop\models\Product;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii;

class CartviewController extends DefaultController
{
//iterl_todo : place dvizh order to admin backend
    public function actionIndex()
    {
        $elements = yii::$app->cart->elements;
        return $this->render('@frontend/themes/web6themes/view/cartview/index',
            compact('elements'));
    }
	public function actionPayment()
    {
        $elements = yii::$app->cart->elements;
        return $this->render('@frontend/themes/web6themes/view/cartview/payment',
            compact('elements'));
    }
	
}
