<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>

<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
?>
<?php $this->beginPage() ?>
<html lang="tr">

    <head>
        <?php $this->head() ?>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>

    <title>CMS</title>
    <?php AppAsset::register($this); ?>
    <!-- Bootstrap Core CSS -->
    <link href="css/backend/bootstrap.css" rel="stylesheet"/>
    <!-- MetisMenu CSS -->
    <link href="css/backend/metisMenu.css" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link href="css/backend/sb-admin-2.css" rel="stylesheet"/>
    <!-- Custom Fonts -->
    <link href="css/backend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <?php $this->beginBody(); ?>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">CMS</a>
        </div>
        <!-- /.navbar-header -->

        <?= $this->render('_navbar'); ?>
        <!-- /.navbar-top-links -->

        <?= $this->render('_left_menu'); ?>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <button onclick="startLoading('');">Click Me</button>
                    <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]);?>
                    <?= $content ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php $this->endBody() ?>
<!-- jQuery -->
<!--<script src="js/backend/jquery.js"></script>-->

<!-- Bootstrap Core JavaScript -->
<script src="js/backend/bootstrap.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/backend/metisMenu.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/backend/sb-admin-2.js"></script>

<div id="loading-layout">
    <div style="margin:0 auto; margin-top: 150px;  width: 30%; min-width: 300px; z-index: 99999; opacity: none; text-align: center;">
        <div class="panel panel-default">
            <div  class="panel-heading">Yükleniyor...<i onclick="stopLoading()" style="cursor:pointer;" class="glyphicon glyphicon-remove pull-right"></i> </div>
            <div class="panel-body">
                <div id="loading-message"></div>
                <center><img src ="http://cursos.cenofisco.com.br/Imagens/carregando.gif"/></center>
                <br>
            </div>
            <!-- <img src="http://www.konurbilgisayar.com.tr/images/ajax-loader.gif"/>-->
        </div>
    </div>
</div>
</body>

</html>
<?php  $this->endPage() ?>