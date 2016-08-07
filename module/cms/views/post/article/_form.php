<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->errorSummary($model); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id_category')->dropDownList(ArrayHelper::map(\app\models\Category::find()->all(), 'id_category', 'name')); ?>
    <?= $form->field($model, 'id_taxonomy')->dropDownList(ArrayHelper::map(\app\models\Taxonomy::find()->all(), 'id_taxonomy', 'name'), ['disabled' => 'disabled']); ?>
    <?php // $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full' //basic,standart,full,http://hosannahighertech.co.tz/blog/mweledi/11-Yii2-CKEditor-and-Images-Upload
    ]); ?>
    <?=
    $form->field($model, 'coverFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' => 'Kapak Fotoğrafı Seçiniz.'
        ],
            //'pluginOptions' => ['uploadUrl' => Url::to(['post/uploadcoverphoto']),],
    ]);
    ?>
    <?= $form->field($model, 'status')->dropDownList(array(1 => 'Aktif', 0 => 'Pasif')); ?>
    <?= $form->field($model, 'comment_status')->dropDownList(array(1 => 'Yoruma Açık', 0 => 'Yoruma Kapalı')); ?>
    
    <?php // $form->field($model, 'cover_photo')->textInput(['maxlength' => true]); ?>
    <?php // $form->field($model, 'comment_status')->checkbox() ?>
    <?php // $form->field($model, 'comment_count')->textInput() ?>
    <?php // $form->field($model, 'display_count')->textInput() ?>
    <?php // $form->field($model, 'datetime_publish')->textInput() ?>
    <?php // $form->field($model, 'datetime_create')->textInput() ?>
    <?php // $form->field($model, 'datetime_update')->textInput() ?>  
    <?php // $form->field($model, 'id_category')->textInput() ?>
    <?php // $form->field($model, 'status')->checkbox()  ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Kaydet' : 'Güncelle', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','onclick'=>' if($(".error-summary").css("display") != "none") {startLoading();}']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
