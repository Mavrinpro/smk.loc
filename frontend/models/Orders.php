<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property int|null $department_id
 * @property int|null $branch_id
 * @property int|null $user_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $user_id_update
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['department_id', 'branch_id', 'user_id', 'create_at', 'update_at', 'user_id_update'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['text'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'department_id' => 'Отдел',
            'branch_id' => 'Филиал',
            'user_id' => 'User ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'user_id_update' => 'User Id Update',
        ];
    }
}
