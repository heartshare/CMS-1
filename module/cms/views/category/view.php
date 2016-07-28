<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?>

        <p class="pull-right">
            <?= Html::a('Update', ['update', 'id' => $model->id_category], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->id_category], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>
    </h1>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_category',
            [
                'attribute' => 'id_user',
                'value' => $model->user->username,
                'format' => 'html',
            ],
            'name',
            'status:boolean',
            'datetime_create',
            'datetime_update',
        ],
    ])
    ?>

</div>
