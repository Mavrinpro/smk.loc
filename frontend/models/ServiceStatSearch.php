<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServiceStat;

/**
 * ServiceStatSearch represents the model behind the search form of `app\models\ServiceStat`.
 */
class ServiceStatSearch extends ServiceStat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'service_id', 'department_id', 'create_at', 'update_at', 'user_id_create', 'user_id_update', 'active'], 'integer'],
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
        $query = ServiceStat::find();

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
            'user_id' => $this->user_id,
            'service_id' => $this->service_id,
            'department_id' => $this->department_id,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'user_id_create' => $this->user_id_create,
            'user_id_update' => $this->user_id_update,
            'active' => $this->active,
        ]);

        return $dataProvider;
    }
}
