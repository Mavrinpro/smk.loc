<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "result_test".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $test_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $question_id
 * @property int|null $answer_id
 * @property int|null $time_test
 * @property int|null $completed
 */
class ResultTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'result_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['answer_id'], 'safe', 'message' => 'Выберите вариант ответа'],
            
            [['user_id', 'test_id', 'create_at', 'update_at', 'question_id', 'time_test', 'completed'], 'integer'],
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
            'test_id' => 'Test ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'question_id' => 'Question ID',
            'answer_id' => 'Вариант ответа',
            'time_test' => 'Time Test',
            'completed' => 'Completed',
        ];
    }
}
