<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PostComment */

$this->title = 'Update Post Comment: ' . $model->id_comment;
$this->params['breadcrumbs'][] = ['label' => 'Post Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comment, 'url' => ['view', 'id' => $model->id_comment]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
