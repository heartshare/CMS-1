<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author Murat çelik
 */
class ToolsComponent extends Component {

    public function getUserId() {
        return 1; // sonra yazılacak
    }

    public function getDateNow() {
        return date("Y-m-d");
    }

    public function getHourNow() {
        return date("H:i:s");
    }

    public function getDateTimeNow() {
        return date("Y-m-d H:i:s");
    }

    public function responseJSON() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }

    public function responseXML() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
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

    private function printMessage($type, $message) {
        Yii::$app->session->setFlash($type, $message);
    }

    public function printSuccess($message = 'işlem başarılı.') {
        return $this->printMessage('success', $message);
    }

    public function printInfo($message) {
        return $this->printMessage('info', $message);
    }

    public function printWarning($message) {
        return $this->printMessage('warning', $message);
    }

    public function printDanger($message) {
        return $this->printMessage('danger', $message);
    }

    public function cleanTurkish($string) {
        $string = str_replace(array('ı', 'ğ', 'ü', 'ş', 'ö', 'ç'), array('i', 'g', 'u', 's', 'o', 'c'), $string);
        $string = str_replace(array('İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç'), array('I', 'G', 'U', 'S', 'O', 'C'), $string);

        return $string;
    }

    public function strToFilename($filename) {

        $filename = strip_tags($filename);
        $filename = self::cleanTurkish($filename);
        $filename = mb_convert_case($filename, MB_CASE_TITLE);

        $filename = preg_replace_callback('|[0-9]{2}[A-z]{2}[0-9]{4}|', function ($matches) {
            return strtoupper($matches[0]);
        }, $filename);

        $filename = str_replace('/', '-', $filename);
        $filename = str_replace(' ', '-', $filename);

        return strtolower(trim($filename));
    }

}
