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
 * @property int|null $check_id
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
            [['user_id', 'create_at', 'score', 'check_id'], 'integer'],
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

    public function getUser(){
        return $this->hasOne(\common\models\User::class, ['id' => 'user_id']);
    }

    public function getCheck(){
        return $this->hasOne(\app\models\Check::class, ['id' => 'check_id']);
    }
}
