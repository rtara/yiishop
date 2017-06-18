<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 17.06.2017
 * Time: 22:19
 */

namespace frontend\components\widgets;
use dvizh\shop\models\Category;
use yii\helpers\Url;
use Yii;

class CategoryDropdown
{
    public static function getTree($categories) {
        $tree = [];
        foreach ($categories as $id=>&$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $categories[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        return $tree;
    }


    public static function buildItems ($tree)
    {
        $menuItems = [];
        foreach ($tree as $category) {
            if ($category['childs']) {
                array_push($menuItems, [
                    'label' => $category['name'],
//                    'url' => Url::to('category/index', ['id' => $category['id']]),
                    'items' => CategoryDropdown::buildItems($category['childs']),
                ]);
            } else {
                array_push($menuItems, [
                    'label' => $category['name'],
//                    'url' => Url::toRoute(['category/index', 'id' => $category['id']]),
                    'url' => Url::to(['category/index', 'id' => $category['id']]),
                ]);
            }
        }
        return $menuItems;
    }

    public static function run()
    {
        //get cache
        $catDropdownItems = Yii::$app->cache->get('catDropdownItems');
        if ($catDropdownItems) return $catDropdownItems;
        $tree = static::getTree(Category::find()->indexBy('id')->asArray()->all());
        $items = static::buildItems($tree);
        //set cache
        Yii::$app->cache->set('catDropdownItems', $items, 60);
        return $items;
    }
}