<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 29.06.2017
 * Time: 3:34
 */

namespace frontend\components\widgets;

use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use yii\helpers\Html;

class MyListView extends ListView
{
    public function renderSection($name)
    {
        switch ($name) {
//            case '{summary}':
            case '{none}':
                return $this->renderSummary();
            case '{items}':
                return $this->renderItems();
            case '{pager}':
                return $this->renderPager();
            case '{sorter}':
                return $this->renderSorter();
            default:
                return false;
        }
    }

    public function run()
    {
        if ($this->showOnEmpty || $this->dataProvider->getCount() > 0) {
            $content = preg_replace_callback('/{\\w+}/', function ($matches) {
                $content = $this->renderSection($matches[0]);
                $content = Html::tag('div', $content, ['class' => 'clearfix']);

                return $content === false ? $matches[0] : $content;
            }, $this->layout);
        } else {
            $content = $this->renderEmpty();
        }

        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'div');
        echo Html::tag($tag, $content, $options);
    }
}