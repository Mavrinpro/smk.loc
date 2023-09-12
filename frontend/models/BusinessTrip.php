<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business_trip".
 *
 * @property int $id
 * @property int|null $doctor_id
 * @property int|null $department_id
 * @property int|null $user_id_create
 * @property int|null $user_id_update
 * @property int|null $check_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $start_trip
 * @property int|null $end_trip
 * @property int|null $date_of_departure
 * @property int|null $return_date
 */
class BusinessTrip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'business_trip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'department_id', 'user_id_create', 'user_id_update', 'check_id', 'create_at', 'update_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctor_id' => 'Врач',
            'department_id' => 'Отдел',
            'user_id_create' => 'Кто создал',
            'user_id_update' => 'Кто изменил',
            'check_id' => 'Check ID',
            'create_at' => 'Дата создания',
            'update_at' => 'Дата обновления',
            'start_trip' => 'Начало командировки',
            'end_trip' => 'Конец командировки',
            'date_of_departure' => 'Дата выезда',
            'return_date' => 'Дата возвращения',
        ];
    }

    public function getDoctor(){
        return $this->hasOne(\app\models\Doctor::className(), ['id' => 'doctor_id']);
    }

    public function getUser(){
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id_create']);
    }
}
