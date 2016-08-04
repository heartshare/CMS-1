<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_post_tag".
 *
 * @property integer $id_post_tag
 * @property integer $id_user
 * @property integer $id_post
 * @property integer $id_tag
 *
 * @property User    $user
 * @property Post    $post
 * @property Tag     $tag
 */
class PostTag extends \app\components\CmsModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_post_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user',  'id_post', 'id_tag'], 'required'],
            [['id_user',  'id_post', 'id_tag'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['id_post' => 'id_post']],
            [['id_tag'],  'exist', 'skipOnError' => true, 'targetClass' => Tag::className(),  'targetAttribute' => ['id_tag' =>  'id_tag']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_post_tag' => 'Id Post Tag',
            'id_user'     => 'Id User',
            'id_post'     => 'Id Post',
            'id_tag'      => 'Id Tag',
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
        return $this->hasOne(Post::className(), ['id_post' => 'id_post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag() {
        return $this->hasOne(Tag::className(), ['id_tag' => 'id_tag']);
    }
}
