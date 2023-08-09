<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checklist_medical".
 *
 * @property int $id
 * @property string $name
 * @property int|null $department_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $user_id_create
 * @property int|null $user_id_update
 * @property int|null $active
 */
class ChecklistMedical extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checklist_medical';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'safe'],
            [['department_id', 'create_at', 'update_at', 'user_id_create', 'user_id_update', 'active'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Критерий',
            'department_id' => 'Department ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'user_id_create' => 'User Id Create',
            'user_id_update' => 'User Id Update',
            'active' => 'Active',
        ];
    }
}
