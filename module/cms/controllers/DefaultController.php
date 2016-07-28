<?php

namespace app\module\cms\controllers;

use yii\web\Controller;


/**
 * Default controller for the `cms` module
 */
class DefaultController extends BackendController
{
   
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
