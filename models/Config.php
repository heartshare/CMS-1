<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_config".
 *
 * @property integer $id_config
 * @property string  $title
 * @property string  $name
 * @property string  $value
 * @property string  $type
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title',  'name', 'value'], 'required'],
            [['value'], 'string'],
            [['title'], 'string', 'max' => 512],
            [['name'],  'string', 'max' => 64],
            [['type'],  'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_config' => 'Id Config',
            'title' =>     'Title',
            'name' =>      'Name',
            'value' =>     'Value',
            'type' =>      'Type',
        ];
    }
}
