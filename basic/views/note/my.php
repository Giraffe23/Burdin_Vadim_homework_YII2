<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Мои заметки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php Pjax::begin();?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::a('Создать новую заметку', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        [
            'attribute' => 'text',
            'label'     => 'Текст заметки',
        ],
        [
            'attribute' => 'created_at',
            'label' => 'Заметка создана',
            'format'    => 'datetime',
        ],
        [
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {share} {delete} ',
            'buttons'  => [
                'share' => function ($url, $model, $key) {
                    return Html::a(\yii\bootstrap\Html::icon('share'), ['access/create', 'noteId' => $model->id]);
                },
            ],
        ],
    ],
]);?>
    <?php Pjax::end();?>
</div>
