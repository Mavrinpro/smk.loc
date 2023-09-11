<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BusinessTrip;

/**
 * BusinessTripSearch represents the model behind the search form of `app\models\BusinessTrip`.
 */
class BusinessTripSearch extends BusinessTrip
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'doctor_id', 'department_id', 'user_id_create', 'user_id_update', 'check_id', 'create_at', 'update_at', 'start_trip', 'end_trip', 'date_of_departure', 'return_date'], 'integer'],
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
        $query = BusinessTrip::find();

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
            'doctor_id' => $this->doctor_id,
            'department_id' => $this->department_id,
            'user_id_create' => $this->user_id_create,
            'user_id_update' => $this->user_id_update,
            'check_id' => $this->check_id,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'start_trip' => $this->start_trip,
            'end_trip' => $this->end_trip,
            'date_of_departure' => $this->date_of_departure,
            'return_date' => $this->return_date,
        ]);

        return $dataProvider;
    }
}
