<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PostTag */

$this->title = 'Update Post Tag: ' . $model->id_post_tag;
$this->params['breadcrumbs'][] = ['label' => 'Post Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_post_tag, 'url' => ['view', 'id' => $model->id_post_tag]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
