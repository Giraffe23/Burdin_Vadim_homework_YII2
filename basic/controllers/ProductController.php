<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $model        = new Product();
        $model->id    = 1;
        $model->name  = 'morakniv';
        $model->price = '1000 руб.';
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
