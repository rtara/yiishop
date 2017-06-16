<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 12.06.2017
 * Time: 14:33
 */

namespace frontend\components\widgets;
use yii\base\Widget;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;


class MyDropdown extends \yii\bootstrap\Dropdown
{
    public function init()
    {
        if ($this->submenuOptions === null) {
            // copying of [[options]] kept for BC
            // @todo separate [[submenuOptions]] from [[options]] completely before 2.1 release
            $this->submenuOptions = $this->options;
            unset($this->submenuOptions['id']);
        }
        Widget::init();
        Html::addCssClass($this->options, ['widget' => 'dropdown-menu multi-column columns-3']);
    }

    /**
     * @param array $items
     * @param array $options
     * @return string
     */
    protected function renderItems($items, $options = [])
    {
        $lines = [];
        foreach ($items as $item) {
            if (is_string($item)) {
                $lines[] = $item;
                continue;
            }
            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }
            if (!array_key_exists('label', $item)) {
                throw new InvalidConfigException("The 'label' option is required.");
            }
            $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
            $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
            $itemOptions = ArrayHelper::getValue($item, 'options', []);
            $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
            $linkOptions['tabindex'] = '-1';
            $url = array_key_exists('url', $item) ? $item['url'] : null;
            if (empty($item['items'])) {
                if ($url === null) {
                    $content = $label;
                    Html::addCssClass($itemOptions, ['widget' => 'dropdown-header']);
                } else {
                    $content = Html::a($label, $url, $linkOptions);
                }
            } else {
                $submenuOptions = $this->submenuOptions;
                if (isset($item['submenuOptions'])) {
                    $submenuOptions = array_merge($submenuOptions, $item['submenuOptions']);
                }
                $content = Html::tag('h6', $label)
                    . $this->renderItems($item['items'], $submenuOptions);
                Html::addCssClass($itemOptions, ['widget' => 'col-sm-3']);
                //$content = Html::tag('div', $content, ['class' => 'col-sm-3']);

            }


                if (strpos($content, 'h6')) {
//                    $lines2[] = Html::tag('div', $content, ['class' => 'col-sm-3']);
                    $columns[] = Html::tag('ul', $content, ['class' => 'multi-column-dropdown']);
                } else {
                    $columns[] = Html::tag('li', $content);
                }
        }

        foreach ($columns as $column) {
            if (strpos($column, 'multi-column-dropdown'))
                $wrappedColumns[] = Html::tag('div', $column, ['class' => 'col-sm-3']);
            else
                $wrappedColumns[] = $column;
        }


        $k=0;
        $tmp=[];
        foreach ($wrappedColumns as $column) {
            if (strpos($column, 'col-sm-3')) {
              if ($k%4==0) {
                  $tmp = [];
                  $tmp[] = $column;
              }
              else
                  if ($k%4==3) {
                      $tmp[] = $column;
                      $linesModified[] = Html::tag('div', implode("\n", $tmp), array('class' => 'row'));
                  } else {
                      $tmp[] = $column;
//                      $linesModified[] = Html::tag('div', implode("\n", $tmp), array('class' => 'row'));
                  }
                $k++;
            } else {
                $linesModified[] = $column;
            }
        }


//        echo $k;


        if ($k%4==4 && $k!=0) {
            $linesModified[] = Html::tag('div', implode("\n", $tmp), array('class' => 'row'));
        }

        if ($k%4!=0 && $k!=0){
            $linesModified[] = Html::tag('div', implode("\n", $tmp), array('class' => 'row'));
        }

        return Html::tag('ul', implode("\n", $linesModified), $options);

    }

}