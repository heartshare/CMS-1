<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\Taxonomy;
use app\models\User;
use \yii\jui\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gönderiler';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
        <p class="pull-right">
            <?= Html::a('Yeni Oluştur', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </h1>
    <?php Pjax::begin(); ?>    
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
                'attribute' => 'id_user',
                //'filter'=> ArrayHelper::map(User::find()->all(), 'id', 'username'),
                'filter' => Select2::widget([
                   'name' => 'PostSearch[id_user]',
                   'data' => ArrayHelper::map(User::find()->all(), 'id', 'username'),
                   'theme' => Select2::THEME_BOOTSTRAP,
                   'options' => [
                       'placeholder' => 'Kullanıcı Seçiniz'
                   ]
                ]),
                'value' => function ($data) { return $data->user->username;},
                'contentOptions' => ['style' => 'width:100px;']
            ],
            [
                'attribute' => 'id_category',
                //'filter'=> ArrayHelper::map(Category::find()->all(), 'id_category', 'name'),
                'filter' => Select2::widget([
                   'name' => 'PostSearch[id_category]',
                   'data' => ArrayHelper::map(Category::find()->all(), 'id_category', 'name'),
                   'theme' => Select2::THEME_BOOTSTRAP,
                   'options' => [
                       'placeholder' => 'Kategori Seçiniz'
                   ]
                ]),
                'value' => function ($data) { return $data->category->name;},
                'contentOptions' => ['style' => 'width:100px;']
            ],
            [
                'attribute' => 'id_taxonomy',
                //'filter'=> ArrayHelper::map(Taxonomy::find()->all(), 'id_taxonomy', 'name'),
                'filter' => Select2::widget([
                   'name' => 'PostSearch[id_taxonomy]',
                   'data' => ArrayHelper::map(Taxonomy::find()->all(), 'id_taxonomy', 'name'),
                   'theme' => Select2::THEME_BOOTSTRAP,
                   'options' => [
                       'placeholder' => 'Tip Seçiniz'
                   ]
                ]),
                'value' => function ($data) { return $data->taxonomy->name;},
                'contentOptions' => ['style' => 'width:100px;']
            ],
            [
                'attribute' => 'display_count',
                'value' => function ($data) { return $data->display_count;},
                'contentOptions' => ['style' => 'width:100px;text-align:center']
            ],
            [
                'attribute' => 'comment_count',
                'value' => function ($data) { return $data->comment_count;},
                'contentOptions' => ['style' => 'width:100px;text-align:center']
            ],
            [
                'attribute' => 'comment_status',
                'filter' => array(1 => "Aktif", 0 => "Pasif"),
                'value' => function ($data) { return $data->labelCommentStatus;},
                'format' => 'html',
                'contentOptions' => ['style' => 'width:100px; text-align:center']
            ],        
            [
                'attribute' => 'status',
                'filter' => array(1 => "Aktif", 0 => "Pasif"),
                'value' => function ($data) { return $data->labelStatus;},
                'format' => 'html',
                'contentOptions' => ['style' => 'width:100px; text-align:center']
            ],
            [
                'attribute' => 'datetime_publish',
                'value'=>'datetime_publish',
                'contentOptions' => ['style' => 'width:160px;'],
                'filter' => DatePicker::widget(['language' => 'tr', 'dateFormat' => 'yyyy-MM-dd','model'=>$searchModel,'options' => ['class' => 'form-control'],'attribute'=>'datetime_publish',]),
                'format' => 'html',
            ],
           
            
            // 'cover_photo',
            // 'status:boolean',
            // 'datetime_publish',
            // 'datetime_create',
            // 'datetime_update',
            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:80px;']],
        ],
    ]);
    ?>
<?php Pjax::end(); ?></div>
