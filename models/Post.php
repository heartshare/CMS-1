<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_post".
 *
 * @property integer $id_post
 * @property integer $id_user
 * @property integer $id_category
 * @property integer $id_taxonomy
 * @property string  $content
 * @property string  $title
 * @property string  $cover_photo
 * @property boolean $status
 * @property boolean $comment_status
 * @property integer $comment_count
 * @property integer $display_count
 * @property string  $datetime_publish
 * @property string  $datetime_create
 * @property string  $datetime_update
 *
 * @property User           $user
 * @property Category       $category
 * @property Taxonomy       $taxonomy
 * @property PostComment[]  $postComments
 * @property PostDocument[] $postDocuments
 * @property PostMetadata[] $postMetadatas
 * @property PostTag[]      $postTags
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_taxonomy', 'content', 'title', 'cover_photo'], 'required'],
            [['id_user', 'id_category', 'id_taxonomy', 'comment_count', 'display_count'], 'integer'],
            [['content'], 'string'],
            [['status', 'comment_status'], 'boolean'],
            [['datetime_publish', 'datetime_create', 'datetime_update'], 'safe'],
            [['title', 'cover_photo'], 'string', 'max' => 1024],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id_category']],
            [['id_taxonomy'], 'exist', 'skipOnError' => true, 'targetClass' => Taxonomy::className(), 'targetAttribute' => ['id_taxonomy' => 'id_taxonomy']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_post'          => 'Id Post',
            'id_user'          => 'Id User',
            'id_category'      => 'Id Category',
            'id_taxonomy'      => 'Id Taxonomy',
            'content'          => 'Content',
            'title'            => 'Title',
            'cover_photo'      => 'Cover Photo',
            'status'           => 'Status',
            'comment_status'   => 'Comment Status',
            'comment_count'    => 'Comment Count',
            'display_count'    => 'Display Count',
            'datetime_publish' => 'Datetime Publish',
            'datetime_create'  => 'Datetime Create',
            'datetime_update'  => 'Datetime Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id_category' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxonomy(){
        return $this->hasOne(Taxonomy::className(), ['id_taxonomy' => 'id_taxonomy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostComments(){
        return $this->hasMany(PostComment::className(), ['id_post' => 'id_post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostDocuments(){
        return $this->hasMany(PostDocument::className(), ['id_post' => 'id_post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostMetadatas(){
        return $this->hasMany(PostMetadata::className(), ['id_post' => 'id_post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags(){
        return $this->hasMany(PostTag::className(), ['id_post' => 'id_post']);
    }
}
