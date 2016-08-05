<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_taxonomy".
 *
 * @property integer $id_taxonomy
 * @property integer $id_user
 * @property string  $name
 * @property boolean $status
 * @property string  $datetime_create
 * @property string  $datetime_update
 *
 * @property Post[]  $posts
 * @property User    $user
 */
class Taxonomy extends \app\components\CmsModel
{
    const TAXONOMY_ARTICLE      = 1; // Makale
    const TAXONOMY_NEWS         = 2; // Haber
    const TAXONOMY_ANNOUNCEMENT = 3; // Duyuru
    const TAXONOMY_GALLERY      = 4; // Galeri
    const TAXONOMY_PAGE         = 5; // Sayfa

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_taxonomy';
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
            'id_taxonomy' => 'Id Taxonomy',
            'id_user' => 'Id User',
            'name' => 'Name',
            'status' => 'Status',
            'datetime_create' => 'Datetime Create',
            'datetime_update' => 'Datetime Update',
        ];
    }
    
    public function getTaxomonies(){
        return ['Makale'=>self::TAXONOMY_ARTICLE,'Haber'=>self::TAXONOMY_NEWS,'Duyuru'=>self::TAXONOMY_ANNOUNCEMENT,'Galeri'=>self::TAXONOMY_GALLERY,'Sayfa'=>self::TAXONOMY_PAGE];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id_taxonomy' => 'id_taxonomy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
