<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostCommentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-comment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_comment') ?>

    <?= $form->field($model, 'id_post') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'author_email') ?>

    <?= $form->field($model, 'author_IP') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'status')->checkbox() ?>

    <?php // echo $form->field($model, 'datetime_create') ?>

    <?php // echo $form->field($model, 'datetime_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
