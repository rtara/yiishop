<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 22.06.2017
 * Time: 20:15
 */

// iterl_todo : below code is a beta func for rendering multiple images from product

    $images = $p->getImages();
    if (count($images)>1) {
        foreach ($images as $image) {
            echo "<img src=\"{$image->getUrl('150x150')}\" class=\"thumb\" />";
        }
    } else {
        $image = $p->getImage()->getUrl('150x150');
        echo "<img src=\"{$image}\" class=\"thumb\" />";
    }
?>