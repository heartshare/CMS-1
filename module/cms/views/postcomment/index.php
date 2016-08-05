<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this         yii\web\View */
/* @var $searchModel  app\module\cms\models\PostCommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yorumlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-comment-index">

    <h1><?= Html::encode($this->title) ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

        <p class="pull-right">
            <?= Html::a('Yeni Yorum', ['create'], ['class' => 'btn btn-success']) ?>
            <?php //app\component\Tools::printR($searchModel);?>
        </p>
    </h1>
    <?php Pjax::begin(); ?>    
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width:50px;']],
            ['attribute' => 'id_comment', 'contentOptions' => ['style' => 'width:50px;']],
            [
                'attribute' => 'author',
                'contentOptions' => ['style' => 'width:150px;']
            ],
            [
                'attribute' => 'post_title',
                'label' => 'Gönderi',
                'value' => function ($data) {
                    return $data->post->title;
                },
                'format' => 'html',
            ],
            ['attribute' => 'datetime_create', 'contentOptions' => ['style' => 'width:150px;']],
            [
                'attribute' => 'status',
                'filter' => array(1 => "Aktif", 0 => "Pasif"),
                'value' => function ($data) {
            return $data->labelStatus;
        },
                'format' => 'html',
                'contentOptions' => ['style' => 'width:50px; text-align:center']
            ],
            // 'content',
            // 'status:boolean',
            // 'datetime_update',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}', 'contentOptions' => ['style' => 'width:20px;'],],
        ],
    ]);
    ?>
<?php Pjax::end(); ?></div>
