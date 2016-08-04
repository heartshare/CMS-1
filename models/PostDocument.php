<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_post_document".
 *
 * @property integer $id_post_document
 * @property integer $id_post
 * @property string  $document_path
 *
 * @property Post    $post
 */
class PostDocument extends \app\components\CmsModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_post_document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_post'], 'required'],
            [['id_post'], 'integer'],
            [['document_path'], 'string', 'max' => 64],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['id_post' => 'id_post']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_post_document' => 'Id Post Document',
            'id_post'          => 'Id Post',
            'document_path'    => 'Document Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost(){
        return $this->hasOne(Post::className(), ['id_post' => 'id_post']);
    }
}
