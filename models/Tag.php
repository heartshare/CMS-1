<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_tag".
 *
 * @property integer   $id_tag
 * @property integer   $id_user
 * @property string    $name
 * @property boolean   $status
 * @property string    $datetime_create
 * @property string    $datetime_update
 *
 * @property PostTag[] $postTags
 * @property User      $user
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user'], 'required'],
            [['id_user'], 'integer'],
            [['status'], 'boolean'],
            [['datetime_create', 'datetime_update'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tag' => 'Id Tag',
            'id_user' => 'Id User',
            'name' => 'Name',
            'status' => 'Status',
            'datetime_create' => 'Datetime Create',
            'datetime_update' => 'Datetime Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['id_tag' => 'id_tag']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
