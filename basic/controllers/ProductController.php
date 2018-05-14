<?php

namespace app\controllers;

use app\models\Knives;
use app\models\Product;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\helpers\VarDumper;

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
        //$model = new Knives(['id' => 1, 'name' => 'morakniv', 'price' => 1000]);
        //$model->id    = 1;
        //$model->name  = 'morakniv';
        //$model->price = '1000 руб.';
        //$models = Knives::find()->asArray()->all();
        //return VarDumper::dumpAsString( $models, 5, true);
        //return VarDumper::dumpAsString(ArrayHelper::getValue($models, '2.description'), 5, true);
        /*
        return VarDumper::dumpAsString(ArrayHelper::getColumn($models, function ($info) {
            return '***' . $info['name'] . $info['id'] . '***';
            }), 5, true);
        */
    
        /*
        return ArrayHelper::getValue($model->getAttributes(), function ($model) {
        return '***' . $model['name'] . $model['id'] . '***';
        });
         */
       //var_dump($model->validate());
      
       //$model->validate();
       //var_dump($model->getErrors());
       $model = new Knives();
       $model->setAttributes(['id' => 1, 'name' => 'moraknivRobust', 'price' => 900]);

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
