<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Etiketler';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-index">

    <h1><?= Html::encode($this->title) ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p class="pull-right"><?= Html::a('Yeni Oluştur', ['create'], ['class' => 'btn btn-success']) ?></p>
    </h1>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_tag',
            [
                'attribute' => 'id_user',
                'value' => function ($data) { return $data->user->username;},
                'format' => 'html',
            ],
            'name',
             [
                'attribute' => 'status',
                'filter' => array(1 => "Aktif", 0 => "Pasif"),
                'value' => function ($data) { return $data->labelStatus;},
                'format' => 'html',
                'contentOptions' => ['style' => 'width:50px; text-align:center']
            ],
            'datetime_create',
            // 'datetime_update',

            ['class' => 'yii\grid\ActionColumn','template' => '{view} {update}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
