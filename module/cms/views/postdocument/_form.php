<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostDocument */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-document-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_post')->textInput() ?>

    <?= $form->field($model, 'document_path')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
