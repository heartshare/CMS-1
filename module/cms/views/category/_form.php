<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this  yii\web\View */
/* @var $model app\models\Category */
/* @var $form  yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php
    $form = ActiveForm::begin([
                'enableAjaxValidation' => true,
                'enableClientValidation' => FALSE,
    ]);
    ?>
    <?= $form->errorSummary($model); ?>
    <?php // $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(array(1 => 'Aktif', 0 => 'Pasif')); ?>

    <?php // $form->field($model, 'datetime_create')->textInput() ?>

    <?php // $form->field($model, 'datetime_update')->textInput()  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Kaydet' : 'Güncelle', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
