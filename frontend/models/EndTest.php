<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "end_test".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $test_id
 * @property int|null $date_end_test
 */
class EndTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'end_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'test_id', 'date_end_test'], 'integer'],
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
            'date_end_test' => 'Date End Test',
        ];
    }
}
