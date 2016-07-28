<?php

namespace app\module\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PostDocument;

/**
 * PostDocumentSearch represents the model behind the search form about `app\models\PostDocument`.
 */
class PostDocumentSearch extends PostDocument
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_post_document', 'id_post'], 'integer'],
            [['document_path'], 'safe'],
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
        $query = PostDocument::find();

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
            'id_post_document' => $this->id_post_document,
            'id_post' => $this->id_post,
        ]);

        $query->andFilterWhere(['like', 'document_path', $this->document_path]);

        return $dataProvider;
    }
}
