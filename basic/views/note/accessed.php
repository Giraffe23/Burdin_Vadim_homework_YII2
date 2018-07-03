<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Доступные мне заметки';
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
            'attribute' => 'creator.name',
            'label'     => 'Имя автора',
        ],
        //'creator.name',

        [
            'attribute' => 'created_at',
            'label' => 'Заметка создана',
            'format'    => 'datetime',
        ],
        [
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{view}',
        ],
    ],
]);?>
    <?php Pjax::end();?>
</div>
