<?php
/**
 * Created by PhpStorm.
 * User: Iterl
 * Date: 15.07.2017
 * Time: 17:36
 */

namespace frontend\controllers;

use dvizh\shop\models\Product;
use dvizh\shop\models\Category;
use yii\helpers\Html;
use Yii;


class ProductController extends AppController
{

    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $model = Product::findOne($id);
        $relIdArr = [];
        if($relations = $model->getRelations()) {
            foreach($relations->all() as $related) {
                $relIdArr[] = Html::encode($related->getId());
            }
        }
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => Product::Find()->where(['id' => $relIdArr]),
        ]);


        return $this->render('view', compact('model', 'dataProvider'));
    }

}