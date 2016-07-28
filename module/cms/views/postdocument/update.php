<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PostDocument */

$this->title = 'Update Post Document: ' . $model->id_post_document;
$this->params['breadcrumbs'][] = ['label' => 'Post Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_post_document, 'url' => ['view', 'id' => $model->id_post_document]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
