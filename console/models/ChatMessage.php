<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "chat_message".
 *
 * @property int $id
 * @property int|null $message_id
 * @property int|null $user_id
 */
class ChatMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message_id' => 'Message ID',
            'user_id' => 'User ID',
        ];
    }

    public static function getUsersMessageCount()
    {
        return self::find()
            ->select(['user_id', 'COUNT(user_id)'])
            ->groupBy('user_id')
            ->asArray()
            ->all();
    }
}
