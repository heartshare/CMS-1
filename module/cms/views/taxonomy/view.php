<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Taxonomy */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Taxonomies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taxonomy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_taxonomy], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_taxonomy], [
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
            'id_taxonomy',
            'id_user',
            'name',
            'status:boolean',
            'datetime_create',
            'datetime_update',
        ],
    ]) ?>

</div>
