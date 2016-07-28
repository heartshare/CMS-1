<?php

namespace app\module\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Taxonomy;

/**
 * TaxonomySearch represents the model behind the search form about `app\models\Taxonomy`.
 */
class TaxonomySearch extends Taxonomy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_taxonomy', 'id_user'], 'integer'],
            [['name', 'datetime_create', 'datetime_update'], 'safe'],
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
        $query = Taxonomy::find();

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
            'id_taxonomy' => $this->id_taxonomy,
            'id_user' => $this->id_user,
            'status' => $this->status,
            'datetime_create' => $this->datetime_create,
            'datetime_update' => $this->datetime_update,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
