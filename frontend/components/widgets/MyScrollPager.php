<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 29.06.2017
 * Time: 20:25
 */

namespace frontend\components\widgets;
use kop\y2sp\ScrollPager;
use yii\helpers\Json;
use yii\web\View;
use yii\widgets\LinkPager;

class MyScrollPager extends ScrollPager
{
    public $enabledExtensions = [
        self::EXTENSION_TRIGGER,
        self::EXTENSION_SPINNER,
//        self::EXTENSION_NONE_LEFT,
        self::EXTENSION_PAGING,
        self::EXTENSION_HISTORY
    ];

    public function run()
    {
        // Initialize jQuery IAS plugin
        $pluginSettings = Json::encode([
            'container' => $this->container,
            'item' => $this->item,
            'pagination' => $this->paginationSelector,
            'next' => $this->next,
            'delay' => $this->delay,
            'negativeMargin' => $this->negativeMargin
        ]);
        $initString = empty($this->overflowContainer)
            ? "var {$this->id}_ias = jQuery.ias({$pluginSettings});"
            : "var {$this->id}_ias = jQuery('{$this->overflowContainer}').ias({$pluginSettings});";
        $this->view->registerJs($initString, View::POS_READY, "{$this->id}_ias_main");

        // Register IAS extensions
        $this->registerExtensions([
            [
                'name' => self::EXTENSION_PAGING
            ],
            [
                'name' => self::EXTENSION_SPINNER,
                'options' =>
                    !empty($this->spinnerSrc)
                        ? ['html' => $this->spinnerTemplate, 'src' => $this->spinnerSrc]
                        : ['html' => $this->spinnerTemplate]
            ],
            [
                'name' => self::EXTENSION_TRIGGER,
                'options' => [
                    'text' => $this->triggerText,
                    'html' => $this->triggerTemplate,
                    'offset' => $this->triggerOffset
                ]
            ],
            [
                'name' => self::EXTENSION_NONE_LEFT,
                'options' => [
                    'text' => $this->noneLeftText,
                    'html' => $this->noneLeftTemplate
                ]
            ],
            [
                'name' => self::EXTENSION_HISTORY,
                'options' => [
                    'prev' => $this->historyPrev
                ],
                'depends' => [
                    self::EXTENSION_TRIGGER,
                    self::EXTENSION_PAGING
                ]
            ]
        ]);

        // Register event handlers
        $this->registerEventHandlers([
            'scroll' => [],
            'load' => [],
            'loaded' => [],
            'render' => [],
            'rendered' => [],
            'noneLeft' => [],
            'next' => [],
            'ready' => [],
            'pageChange' => [
                self::EXTENSION_PAGING
            ]
        ]);

        // Render pagination links
        echo LinkPager::widget([
            'pagination' => $this->pagination,
            'options' => [
                'class' => 'pagination'
            ]
        ]);
    }

}