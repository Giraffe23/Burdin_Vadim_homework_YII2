<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Knives */

$this->title                   = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Knives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knives-view">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a('Delete', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data'  => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method'  => 'post',
    ]])?>
    </p>

    <?=DetailView::widget([
    'model'      => $model,
    'attributes' => [
        [
            'attribute' => 'name',
            'format'    => 'html',
        ],
        [
            'attribute'      => 'price',
            'format'         => 'html',
            'value'          => '<b>' . $model->price . ' RUR</b>',
            'contentOptions' => ['class' => 'small'],
        ],
        'description',
        [
            'attribute' => 'createdAt',
            'format'    => ['date', 'd-MM-Y'],
            'label'     => 'Added To Store',
        ],
    ]])?>

</div>
