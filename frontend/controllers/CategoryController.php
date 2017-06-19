<?php

namespace frontend\controllers;

use dvizh\shop\models\Product;
use Yii;
use dvizh\shop\models\Category;
use dvizh\shop\models\category\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class CategoryController extends Controller
{
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'roles' => $this->module->adminRoles,
//                    ],
//                ]
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'edittable' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
//        $id = Yii::$app->request->get('id');
//
//        $searchModel = new CategorySearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//        return $this->render('index', compact('searchModel', 'dataProvider', 'id'));
        return $this->render('index');
    }

    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $products = Product::Find()->where(['category_id' => $id])->all();
        return $this->render('view', compact('products', 'id'));
    }

    protected function findModel($id)
    {
        $model = new Category;
        
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested product does not exist.');
        }
    }
    
    protected function findModelBySlug($slug)
    {
        $model = new Category;
        
        if (($model = $model::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested product does not exist.');
        }
    }
}
