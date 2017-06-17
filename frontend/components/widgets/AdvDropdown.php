<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 17.06.2017
 * Time: 22:19
 */

namespace frontend\components\widgets;

class AdvDropdown
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
                    'items' => AdvDropdown::buildItems($category['childs']),
                    'options' => [
                        'class' => ''
                    ]
                ]);
            } else {
                array_push($menuItems, [
                    'label' => $category['name'],
                    'url' => '#',
                    'options' => [
                        'class' => ''
                    ],
                ]);
            }
        }
        return $menuItems;
    }

    public function run($categories)
    {
        $tree = static::getTree($categories);
        $items = static::buildItems($tree);
        return $items;
    }
}