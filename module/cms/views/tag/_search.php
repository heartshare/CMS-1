<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TagSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tag-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tag') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'datetime_create') ?>

    <?php // echo $form->field($model, 'datetime_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
