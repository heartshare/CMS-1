<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PostComment */

$this->title = $model->author;
$this->params['breadcrumbs'][] = ['label' => 'Yorumlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-comment-view">

    <h1><?= Html::encode($this->title) ?>

        <p class="pull-right">
            
            <?php
//            Html::a('Onayla', ['Status', 'id' => $model->id_comment], [
//                'class' => 'btn btn-success',
//                'data' => [
//                    'confirm' => 'Onaylamak istediğinize emin misiniz ?',
//                    'method' => 'post',
//                ],
//            ])
//            ?>
            <?php
//            Html::a('Pasife Al', ['delete', 'id' => $model->id_comment], [
//                'class' => 'btn btn-warning',
//                'data' => [
//                    'confirm' => 'Are you sure you want to delete this item?',
//                    'method' => 'post',
//                ],
//            ])
            ?>
        </p>
    </h1>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_comment',
            'id_post',
            'author',
            'author_email:email',
            'author_IP',
            'content',
            'status:boolean',
            'datetime_create',
            'datetime_update',
        ],
    ])
    ?>

</div>
