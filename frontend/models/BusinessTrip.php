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
            [['doctor_id', 'department_id', 'user_id_create', 'user_id_update', 'check_id', 'create_at', 'update_at', 'start_trip', 'end_trip', 'date_of_departure', 'return_date'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctor_id' => 'Doctor ID',
            'department_id' => 'Department ID',
            'user_id_create' => 'User Id Create',
            'user_id_update' => 'User Id Update',
            'check_id' => 'Check ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'start_trip' => 'Start Trip',
            'end_trip' => 'End Trip',
            'date_of_departure' => 'Date Of Departure',
            'return_date' => 'Return Date',
        ];
    }
}
