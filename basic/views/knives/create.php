<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Knives */

$this->title = 'Create Knives';
$this->params['breadcrumbs'][] = ['label' => 'Knives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knives-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
