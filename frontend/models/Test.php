<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $result
 * @property string|null $name
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $action
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'create_at', 'update_at', 'action'], 'integer'],
            [['result', 'name'], 'string', 'max' => 255],
            [['name'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Название',
            'result' => 'Result',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'action' => 'Action',
        ];
    }
}
