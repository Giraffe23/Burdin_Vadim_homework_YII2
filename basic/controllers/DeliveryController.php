<?php

namespace app\controllers;

use app\models\DeliveryForm;
use Yii;
use yii\web\Controller;

class DeliveryController extends Controller
{
    public function actionIndex()
    {
        $model = new DeliveryForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
