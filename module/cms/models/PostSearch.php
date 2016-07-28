<?php

namespace app\module\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post;

/**
 * PostSearch represents the model behind the search form about `app\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_post', 'id_user', 'id_category', 'id_taxonomy', 'comment_count', 'display_count'], 'integer'],
            [['content', 'title', 'cover_photo', 'datetime_publish', 'datetime_create', 'datetime_update'], 'safe'],
            [['status', 'comment_status'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Post::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_post' => $this->id_post,
            'id_user' => $this->id_user,
            'id_category' => $this->id_category,
            'id_taxonomy' => $this->id_taxonomy,
            'status' => $this->status,
            'comment_status' => $this->comment_status,
            'comment_count' => $this->comment_count,
            'display_count' => $this->display_count,
            'datetime_publish' => $this->datetime_publish,
            'datetime_create' => $this->datetime_create,
            'datetime_update' => $this->datetime_update,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content])
              ->andFilterWhere(['like', 'title', $this->title])
              ->andFilterWhere(['like', 'cover_photo', $this->cover_photo]);

        return $dataProvider;
    }
}
