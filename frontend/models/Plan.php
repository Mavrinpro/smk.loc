<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $id
 * @property string $name
 * @property int|null $department_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $user_id_create
 * @property int|null $user_id_update
 * @property int|null $active
 * @property int|null $send_user_id
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['department_id', 'create_at', 'update_at', 'user_id_create', 'user_id_update', 'active', 'send_user_id'], 'integer'],
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
            'name' => 'Name',
            'department_id' => 'Department ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'user_id_create' => 'User Id Create',
            'user_id_update' => 'User Id Update',
            'active' => 'Active',
            'send_user_id' => 'Send User ID',
        ];
    }
}
