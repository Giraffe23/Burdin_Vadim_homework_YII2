<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Access */
/* @var $users array */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="access-form">

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'user_id')->dropDownList($users)?>

    <div class="form-group">
        <?=Html::submitButton('Сохранить', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
