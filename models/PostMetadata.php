<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_post_metadata".
 *
 * @property integer $id_post_metadata
 * @property integer $id_post
 * @property integer $id_user
 * @property string  $name
 * @property string  $datetime_create
 * @property string  $datetime_update
 *
 * @property User    $user
 * @property Post    $post
 */
class PostMetadata extends \app\components\CmsModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_post_metadata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_post', 'id_user'], 'required'],
            [['id_post', 'id_user'], 'integer'],
            [['datetime_create', 'datetime_update'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['id_post' => 'id_post']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_post_metadata' => 'Id Post Metadata',
            'id_post'          => 'Id Post',
            'id_user'          => 'Id User',
            'name'             => 'Name',
            'datetime_create'  => 'Datetime Create',
            'datetime_update'  => 'Datetime Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost() {
        return $this->hasOne(CmsPost::className(), ['id_post' => 'id_post']);
    }
}
