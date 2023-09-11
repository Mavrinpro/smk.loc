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
            [['fio'], 'unique', 'message' => 'Такой врач уже есть в базе'],
            [['branch_id'], 'safe'],
            [['create_at', 'update_at',], 'integer'],
            [['branch_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО врача',
            'department_id' => 'Отдел',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'branch_id' => 'Филиал клиники',
        ];
    }

    public function getUsersend(){
        return $this->hasOne(\app\models\Branch::className(), ['id' => 'branch_id']);
    }
}
