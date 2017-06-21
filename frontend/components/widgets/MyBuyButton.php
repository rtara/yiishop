<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 21.06.2017
 * Time: 15:11
 */

namespace frontend\components\widgets;


use dvizh\cart\widgets\BuyButton;
use yii\base\Widget;
use yii\bootstrap\Button;

class MyBuyButton extends BuyButton
{
    public function init()
    {
        Widget::init();

        \dvizh\cart\assets\WidgetAsset::register($this->getView());

        if ($this->options === NULL) {
            $this->options = (object)[];
        }

        if ($this->text === NULL) {
            $this->text = Button::widget([
                'label' => Yii::t('cart', 'Buy'),
                'options' => ['class' => 'w3ls-cart']
            ]);
        }

        if ($this->cssClass === NULL) {
            $this->cssClass = 'btn btn-success';
        }

        return true;
    }
}