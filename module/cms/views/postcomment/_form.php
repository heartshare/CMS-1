<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostComment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_post')->textInput() ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author_IP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'datetime_create')->textInput() ?>

    <?= $form->field($model, 'datetime_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
