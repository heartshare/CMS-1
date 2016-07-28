<?php

namespace app\module\cms\controllers;

use yii\web\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of base BackendController
 *
 * @author Murat Çelik
 */
class BackendController extends Controller {

    public function beforeAction($action) {
        $this->layout = "@app/module/cms/views/layouts/main";
        return parent::beforeAction($action);
    }

}
