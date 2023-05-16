<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "check_list".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $text1
 * @property string|null $text2
 * @property string|null $text3
 * @property int|null $user_id
 * @property int|null $service_id
 * @property int|null $department_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $user_id_create
 * @property int|null $user_id_update
 * @property int|null $active
 * @property int|null $score
 * @property int|null $phone1
 * @property int|null $phone2
 * @property int|null $phone3
 * @property int|null $phone4
 * @property int|null $phone5
 * @property int|null $phone6
 */
class CheckList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'check_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'service_id', 'department_id', 'create_at', 'update_at', 'user_id_create', 'user_id_update',
                'active', 'score', 'phone1', 'phone2', 'phone3', 'phone4', 'phone5', 'phone6'], 'integer'],
            [['name', 'text1', 'text2', 'text3'], 'string', 'max' => 255],
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
            'text1' => 'Text1',
            'text2' => 'Text2',
            'text3' => 'Text3',
            'user_id' => 'User ID',
            'service_id' => 'Service ID',
            'department_id' => 'Department ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'user_id_create' => 'User Id Create',
            'user_id_update' => 'User Id Update',
            'active' => 'Active',
        ];
    }
}
