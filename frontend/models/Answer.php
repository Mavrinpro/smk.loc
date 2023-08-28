<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $user_id
 * @property int|null $test_id
 * @property int|null $question_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $answer_right
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'test_id', 'question_id', 'create_at', 'update_at', 'answer_right'], 'integer'],
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
            'name' => 'Название',
            'user_id' => 'User ID',
            'test_id' => 'Test ID',
            'question_id' => 'Question ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'answer_right' => 'Right',
        ];
    }

   
}
