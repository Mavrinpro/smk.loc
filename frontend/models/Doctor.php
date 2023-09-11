<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property int $id
 * @property string|null $fio
 * @property int|null $department_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $branch_id
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio'], 'string'],
            [['department_id', 'create_at', 'update_at', 'branch_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'department_id' => 'Department ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
}
