<?php

namespace common\models\data;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `common\models\data\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age', 'sex', 'status', 'check_in_time', 'updated_at'], 'integer'],
            [['name', 'identify_num', 'address'], 'safe'],
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
        $query = Employee::find();

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
            'age' => $this->age,
            'sex' => $this->sex,
            'status' => $this->status,
            'check_in_time' => $this->check_in_time,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'identify_num', $this->identify_num])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
