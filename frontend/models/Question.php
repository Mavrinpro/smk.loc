<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $user_id
 * @property int|null $test_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $answer_right
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'test_id', 'create_at', 'update_at', 'answer_right'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Вопрос',
            'user_id' => 'User ID',
            'test_id' => 'Test ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'answer_right' => 'Right',
        ];
    }
    
}
