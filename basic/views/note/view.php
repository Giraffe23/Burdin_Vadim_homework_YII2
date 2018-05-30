<?php

use app\models\Note;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Note */

$this->title                   = 'Заметка: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Мои Заметки', 'url' => ['my']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-view">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a('Удалить', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data'  => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method'  => 'post',
    ]])?>
    <?=Html::a('Предоставить доступ', ['access/create', 'noteId' => $model->id], ['class' => 'btn btn-success'])?>
    </p>

    <?=DetailView::widget([
    'model'      => $model,
    'attributes' => [
        //'id',
        //'text:ntext',
        [
            'attribute' => 'text',
            'label'     => 'Текст заметки',
        ],
        [
            'attribute' => 'creator_id',
            'label'     => 'ID автора',
        ],
        [
            'attribute' => 'created_at',
            'label'     => 'Заметка создана',
            'format'    => 'datetime',
        ],
    ],
])?>


 <?php Pjax::begin();?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'      => [
        [
            'label' => 'Пользователи, имеющие доступ к заметке',
            'value' => function (\app\models\Note $model) {
                return join(', ', $model->getAccessUsers()->select('name')->column());
            },
        ],
        [
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{share}',
            'buttons'  => [
                'share' => function ($url, $model, $key) {
                    return Html::a(\yii\bootstrap\Html::icon('ban-circle'),
                        ['access/delete-all', 'noteId' => $model->id], [
                            'data' => [
                                'confirm' => 'Закрыть доступ этому пользователю?',
                                'method'  => 'post',
                            ],
                        ]);
                },
            ],
        ],
    ],
]);?>
    <?php Pjax::end();?>

</div>
