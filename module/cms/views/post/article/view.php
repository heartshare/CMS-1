<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Makaleler', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?>

        <p  class="pull-right">
            <?= Html::a('Güncelle', ['update', 'id' => $model->id_post], ['class' => 'btn btn-primary']) ?>
        </p>
    </h1>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_post',
            'id_user',
            ['attribute'=>'id_user','value'=>$model->user->username],
            ['attribute'=>'id_category','value'=>$model->category->name],
            //'id_taxonomy',
            'content:ntext',
            'title',
            'cover_photo',
            'status:boolean',
            'comment_status:boolean',
            'comment_count',
            'display_count',
            'datetime_publish',
            'datetime_create',
            'datetime_update',
        ],
    ])
    ?>

</div>
