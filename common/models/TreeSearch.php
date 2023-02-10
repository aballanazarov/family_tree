<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tree;

/**
 * TreeSearch represents the model behind the search form of `tree\models\Tree`.
 */
class TreeSearch extends Tree
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'birthday', 'death_date', 'spouse_birthday', 'spouse_death_date', 'parent_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'spouse_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Tree::find();

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
            'id' => $this->id,
            'birthday' => $this->birthday,
            'death_date' => $this->death_date,
            'spouse_birthday' => $this->spouse_birthday,
            'spouse_death_date' => $this->spouse_death_date,
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'spouse_name', $this->spouse_name]);

        return $dataProvider;
    }
}
