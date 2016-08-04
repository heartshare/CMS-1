<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategoriler';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Yeni Oluştur', ['create'], ['class' => 'btn btn-success pull-right']) ?></h1>
    <?php //echo '<pre>'; var_dump($searchModel); // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(); ?> 
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            ['attribute'=>'id_category','contentOptions' => ['style' => 'width:50px;']],
            'name',
            [
                'attribute' => 'id_user',
                'value' => function ($data) { return $data->user->username;},
                'format' => 'html',
            ],
            [
                'attribute' => 'status',
                'filter' => array(1 => "Aktif", 0 => "Pasif"),
                'value' => function ($data) { return $data->labelStatus;},
                'format' => 'html',
                'contentOptions' => ['style' => 'width:50px; text-align:center']
            ],
            //'status:boolean',
            //'datetime_create',
            //'datetime_update',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}','contentOptions' => ['style' => 'width:50px;'],],
        ],
    ]);
    ?>
<?php Pjax::end(); ?>
</div>
