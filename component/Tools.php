<?php

namespace app\component;

use Yii;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author murat çelik
 */
class Tools {

    public static function getUserId() {
        return 1; // sonra yazılacak
    }

    public static function getDateNow() {
        return date("Y-m-d");
    }

    public function getHourNow() {
        return date("H:i:s");
    }

    public static function getDateTimeNow() {
        return date("Y-m-d H:i:s");
    }

    public static function printR($array, $exit = false) {
        if (YII_DEBUG) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';

            if ($exit):
                exit;
            endif;
        }
    }

}
