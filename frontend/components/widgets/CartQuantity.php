<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 16.07.2017
 * Time: 2:48
 */

namespace frontend\components\widgets;


use dvizh\cart\widgets\CartInformer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii;

class CartQuantity extends CartInformer
{

    public function init()
    {
        yii\base\Widget::init();

        \dvizh\cart\assets\WidgetAsset::register($this->getView());

        if ($this->offerUrl == NULL) {
            $this->offerUrl = Url::toRoute(["/cart/default/index"]);
        }

        if ($this->text === NULL) {
            $this->text = '{c}';
        }

        return true;
    }

    public function run()
    {
        $cart = yii::$app->cart;

        if($this->showOldPrice == false | $cart->cost == $cart->getCost(false)) {
            $this->text = str_replace(['{c}', '{p}'],
                ['<span class="dvizh-cart-count cart-qty-count">'.$cart->getCount().'</span>', '<strong class="dvizh-cart-price">'.$cart->getCostFormatted().'</strong>'],
                $this->text
            );
        } else {
            $this->text = str_replace(['{c}', '{p}'],
                ['<span class="dvizh-cart-count cart-qty-count">'.$cart->getCount().'</span>', '<strong class="dvizh-cart-price"><s>'.round($cart->getCost(false)).'</s>'.$cart->getCostFormatted().'</strong>'],
                $this->text
            );
        }


        $this->htmlTag = 'div';

        return Html::tag($this->htmlTag, $this->text, [
            'href' => $this->offerUrl,
            'class' => "cart-qty {$this->cssClass}",
        ]);
    }

}