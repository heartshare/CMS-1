<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tag */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Etiketler', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-view">

    <h1>
        <?= Html::encode($this->title) ?>
        <p class="pull-right"><?= Html::a('Güncelle', ['update', 'id' => $model->id_tag], ['class' => 'btn btn-primary']) ?></p>
    </h1>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tag',
            'id_user',
            'name',
            'status:boolean',
            'datetime_create',
            'datetime_update',
        ],
    ])
    ?>

</div>
