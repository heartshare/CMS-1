<?php

use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Makale Oluştur';
$this->params['breadcrumbs'][] = ['label' => 'Makaleler', 'url' => ['articelindex']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>
