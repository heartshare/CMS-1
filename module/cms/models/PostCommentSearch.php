<?php

namespace app\module\cms\models;;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PostComment;

/**
 * PostCommentSearch represents the model behind the search form about `app\models\PostComment`.
 */
class PostCommentSearch extends PostComment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comment', 'id_post'], 'integer'],
            [['author', 'author_email', 'author_IP', 'content', 'datetime_create', 'datetime_update'], 'safe'],
            [['status'], 'boolean'],
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
        $query = PostComment::find();

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
            'id_comment' => $this->id_comment,
            'id_post' => $this->id_post,
            'status' => $this->status,
            'datetime_create' => $this->datetime_create,
            'datetime_update' => $this->datetime_update,
        ]);

        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'author_email', $this->author_email])
            ->andFilterWhere(['like', 'author_IP', $this->author_IP])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
