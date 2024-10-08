<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Subject;

/**
 * SubjectSearch represents the model behind the search form of `backend\models\Subject`.
 */
class SubjectSearch extends Subject
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'marks'], 'integer'],
            [['subjects'], 'safe'],
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
        $query = Subject::find();

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
            'student_id' => $this->student_id,
            'marks' => $this->marks,
        ]);

        $query->andFilterWhere(['like', 'subjects', $this->subjects]);

        return $dataProvider;
    }
}
