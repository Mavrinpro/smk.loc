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
 * @property string|null $answer_text
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
            [['answer_text'], 'safe'],
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

    public function getAnswer()
    {
        return $this->hasOne(\app\models\Answer::class, ['id' => 'answer_id']);
    }

    public function getQuestion()
    {
        return $this->hasOne(\app\models\Question::class, ['id' => 'question_id']);
    }
}
