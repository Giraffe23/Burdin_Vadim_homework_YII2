<?php

use app\models\Note;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Открытые заметки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php Pjax::begin();?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>



    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel'  => $searchModel,
    'columns'      => [
        [
            'attribute' => 'text',
            'label'     => 'Текст заметки',
        ],
        [
            'attribute' => 'created_at',
            'label'     => 'Заметка создана',
            'format'    => 'datetime',
        ],
        [
            'label' => 'Пользователи',
            'value' => function (\app\models\Note $model) {
                return join(', ', $model->getAccessUsers()->select('name')->column());
            },
        ],
        [
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {shareAll}',
            'buttons'  => [
                'shareAll' => function ($url, $model, $key) {
                    return Html::a(\yii\bootstrap\Html::icon('ban-circle'),
                        ['access/delete-all', 'noteId' => $model->id], [
                            'data' => [
                                'confirm' => 'Закрыть доступ всем?',
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
