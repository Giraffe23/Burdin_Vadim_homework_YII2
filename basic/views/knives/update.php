<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Knives */

$this->title = 'Update Knives: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Knives', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="knives-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
