<?php

namespace app\components;

use Yii;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CmsModel
 *
 * @author Murat Çelik
 */
class CmsModel extends \yii\db\ActiveRecord {

    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {
            if (!$this->isNewRecord) {
                Yii::$app->Tools->printSuccess('Güncelleme işlemi başarılı.');
            } else {
                Yii::$app->Tools->printSuccess('Kayıt işlemi başarılı.');
            }
            return true;
        } else {
            return false;
        }
    }

    public function beforeValidate() {
        if (parent::beforeValidate()) {
            if (!$this->isNewRecord) {
                $this->datetime_update = Yii::$app->Tools->getDateTimeNow();
            } else {
                if (strpos(get_class($this), 'Search') === false) {
                    $this->id_user = Yii::$app->Tools->getUserId();
                    $this->datetime_create = Yii::$app->Tools->getDateTimeNow();
                }
            }
            return true;
        }
        return false;
    }

}
