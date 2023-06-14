<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notyfication".
 *
 * @property int $id
 * @property string|null $text
 * @property int|null $user_id
 * @property int|null $user_create_id
 * @property int|null $create_at
 * @property int|null $read
 */
class Notyfication extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notyfication';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['user_id', 'user_create_id', 'create_at', 'read'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'user_id' => 'User ID',
            'user_create_id' => 'User Create ID',
            'create_at' => 'Create At',
            'read' => 'Read',
        ];
    }

    public function showNotyficationOnHead()
    {
        return Notyfication::find()->where(['user_id' => \Yii::$app->getUser()->id, 'read' => 0])->all();
    }
}
