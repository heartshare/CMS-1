<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "cms_category".
 *
 * @property integer $id_category
 * @property integer $id_user
 * @property string  $name
 * @property boolean $status
 * @property string  $datetime_create
 * @property string  $datetime_update
 *
 * @property User    $user
 * @property Post[]  $posts
 */
class Category extends \app\components\CmsModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'cms_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
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
    public function attributeLabels() {
        return [
            'id_category' => 'Kategori ID',
            'id_user' => 'Oluşturan Kullanıcı',
            'name' => 'Kategori Adı',
            'status' => 'Durum',
            'datetime_create' => 'Oluşturma  Tarihi',
            'datetime_update' => 'Değişiklik Tarihi',
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
    public function getPosts() {
        return $this->hasMany(Post::className(), ['id_category' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostsCount() {
        return $this->hasMany(Post::className(), ['id_category' => 'id_category'])->count();
    }
    
    public function getLabelStatus(){
        return $this->status ==1 ? '<i class="glyphicon glyphicon-ok-sign" style="color:green;"></i>' : '<i class="glyphicon glyphicon-remove-sign" style="color:red;"></i>';
    }

}
