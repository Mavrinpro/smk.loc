<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_score".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $user_id
 * @property int|null $create_at
 * @property int|null $score
 */
class UserScore extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_score';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'create_at', 'score'], 'integer'],
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
            'user_id' => 'User ID',
            'create_at' => 'Create At',
            'score' => 'Score',
        ];
    }
}
