<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PostTag */

$this->title = $model->id_post_tag;
$this->params['breadcrumbs'][] = ['label' => 'Post Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-tag-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_post_tag], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_post_tag], [
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
            'id_post_tag',
            'id_user',
            'id_post',
            'id_tag',
        ],
    ]) ?>

</div>
