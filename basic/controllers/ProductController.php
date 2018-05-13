<?php

namespace app\controllers;

use app\components\Service;
use app\models\Product;
use yii\base\BaseObject;
use yii\web\Controller;

class A extends BaseObject
{
    public function setProp($value)
    {
        return $value;
    }

    public function getProp()
    {
        return 233;
    }

}

class ProductController extends Controller
{
    public function actionIndex()
    {
        //$obj       = new A();
        //$obj->prop = 233;
        //return $obj->prop;
        //exit();
        //$service = new Service(['prop' => 23]);
        //return \Yii::$app->service->run();
        //exit();
        $model = new Product(['id' => 1, 'name' => 'morakniv', 'price' => '1000 руб.']);
        //$model->id    = 1;
        //$model->name  = 'morakniv';
        //$model->price = '1000 руб.';
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
