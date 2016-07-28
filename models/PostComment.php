<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_post_comment".
 *
 * @property integer $id_comment
 * @property integer $id_post
 * @property string  $author
 * @property string  $author_email
 * @property string  $author_IP
 * @property string  $content
 * @property boolean $status
 * @property string  $datetime_create
 * @property string  $datetime_update
 *
 * @property Post    $post
 */
class PostComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_post_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_post', 'author', 'content'], 'required'],
            [['id_post'], 'integer'],
            [['status'], 'boolean'],
            [['datetime_create', 'datetime_update'], 'safe'],
            [['author', 'author_email', 'author_IP'], 'string', 'max' => 64],
            [['content'], 'string', 'max' => 2048],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['id_post' => 'id_post']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comment'      => 'Id Comment',
            'id_post'         => 'Id Post',
            'author'          => 'Author',
            'author_email'    => 'Author Email',
            'author_IP'       => 'Author  Ip',
            'content'         => 'Content',
            'status'          => 'Status',
            'datetime_create' => 'Datetime Create',
            'datetime_update' => 'Datetime Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost(){
        return $this->hasOne(CmsPost::className(), ['id_post' => 'id_post']);
    }
}
