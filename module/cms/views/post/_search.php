<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_post') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'id_taxonomy') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'cover_photo') ?>

    <?php // echo $form->field($model, 'status')->checkbox() ?>

    <?php // echo $form->field($model, 'comment_status')->checkbox() ?>

    <?php // echo $form->field($model, 'comment_count') ?>

    <?php // echo $form->field($model, 'display_count') ?>

    <?php // echo $form->field($model, 'datetime_publish') ?>

    <?php // echo $form->field($model, 'datetime_create') ?>

    <?php // echo $form->field($model, 'datetime_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
