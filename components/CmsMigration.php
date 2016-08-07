<?php

namespace app\components;

use yii\db\Migration;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CmsMigration
 *
 * @author Murat Çelik
 */
class CmsMigration extends Migration {

    public function _addColumn($table, $column, $type) {

        // Fetch the table schema
        $table_to_check = Yii::$app->db->schema->getTableSchema($table);
        if (!isset($table_to_check->columns[$column])) {
            $this->addColumn($table, $column, $type);
        }
    }

    public function tableExists($tableName) {
        $table_to_check = Yii::$app->db->schema->getTable($tableName);
        return is_object($table_to_check);
    }

    public function _createTable($table, $columns, $options = NULL) {
        // Fetch the table schema
        $table_to_check = Yii::app()->db->schema->getTable($table);
        if (!is_object($table_to_check)) {
            $this->createTable($table, $columns, $options);
            return TRUE;
        }
        return FALSE;
    }

    public function _addForeignKey($name, $table, $columns, $refTable, $refColumns, $delete = NULL, $update = NULL) {

        $sql = "SELECT TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME
                FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                WHERE TABLE_NAME =  '$table' AND
                ( CONSTRAINT_NAME = '$name' OR  (REFERENCED_TABLE_NAME = '$refTable' AND REFERENCED_COLUMN_NAME = '$refColumns'))";

        $command = Yii::$app->db->createCommand($sql)->queryRow();

        if (!$command)
            $this->addForeignKey($name, $table, $columns, $refTable, $refColumns, $delete = NULL, $update = NULL);
    }

    

    public function _insert($tableName, $params, $unique = true) {

        if ($unique == true) {
            $exists = $this->dbConnection->createCommand('SELECT count(*) FROM ' . $tableName . ' WHERE name="' . $params['name'] . '"')->queryScalar();

            if (!$exists) {
                $this->insert($tableName, $params);
            }
        } else {
            $this->insert($tableName, $params);
        }
    }

}
