<?php

use yii\helpers\Url; ?>

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li><a href="<?= Url::to('index.php?r=cms/default/index') ?>"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Anasayfa</a></li>
            <li><a href="<?= Url::to('index.php?r=cms/category/index') ?>"><i class="fa fa-cubes fa-fw"></i>&nbsp;Kategoriler</a></li>
            <li><a href="<?= Url::to('index.php?r=cms/tag/index') ?>"><i class="fa fa fa-tags fa-fw"></i>&nbsp;Etiketler</a></li>
            <li>
                <a href="#"><i class="fa fa-newspaper-o"></i> Gönderiler<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?= Url::to('index.php?r=cms/post/index') ?>">   <i class="fa fa-folder-open-o fa-fw"></i>&nbsp;Makaleler</a> </li>
                    <li><a href="<?= Url::to('index.php?r=cms/post/index') ?>">   <i class="fa fa-newspaper-o fa-fw"></i>&nbsp;Haberler</a> </li>
                    <li><a href="<?= Url::to('index.php?r=cms/post/index') ?>">   <i class="fa fa-bell fa-fw"></i>&nbsp;Duyurular</a></li>
                    <li><a href="<?= Url::to('index.php?r=cms/post/index') ?>">   <i class="fa fa fa-image fa-fw" ></i>&nbsp;Albümler</a></li>
                    <li><a href="<?= Url::to('index.php?r=cms/page/index') ?>">   <i class="fa fa-file-o fa-fw"></i>&nbsp;Sayfalar</a></li>
                </ul>
            </li>
            <li><a href="<?= Url::to('index.php?r=cms/postcomment/index'); ?>">  <i class="fa fa-comments fa-fw"></i>&nbsp;Yorumlar</a></li>
            <li><a href="<?= Url::to('index.php?r=cms/postdocument/index'); ?>">  <i class="fa fa-sitemap fa-fw"></i>&nbsp;Dosyalar</a></li>
            <li><a href="<?= Url::to('index.php?r=cms/user/index'); ?>">  <i class="fa fa-users fa-fw"></i>&nbsp;Kullanıcılar</a></li>
            <li><a href="<?= Url::to('index.php?r=cms/config/index'); ?>">  <i class="fa fa-gears fa-fw"></i>&nbsp;Ayarlar</a></li>
        </ul>
    </div>
</div>