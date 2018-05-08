<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Knives';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knives-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Create Knives', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php \yii\widgets\Pjax::begin(['enablePushState' => false])?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'      => [
        ['class' => 'yii\grid\SerialColumn'],

        'name',
        [
            'attribute' => 'price',
            'format'    => 'html',
            'label'     => 'Retail Price',
            'value'     => function (\app\models\Knives $model) {
                return $model->price . ' RUR';
            },
        ],
        'description',
        [
            'attribute' => 'createdAt',
            'format'    => ['date', 'd-MM-Y'],
            'label'     => 'Added To Store',
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ]]);?>

    <?php \yii\widgets\Pjax::end()?>
</div>
