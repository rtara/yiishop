<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 24.06.2017
 * Time: 21:44
 */

namespace frontend\controllers;
use yii\web\Controller;

class AppController extends Controller
{
    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->title .= " - Electronic Store by Web6";
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }

}