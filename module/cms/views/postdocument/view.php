<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PostDocument */

$this->title = $model->id_post_document;
$this->params['breadcrumbs'][] = ['label' => 'Post Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_post_document], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_post_document], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_post_document',
            'id_post',
            'document_path',
        ],
    ]) ?>

</div>
