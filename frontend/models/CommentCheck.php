<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment_check".
 *
 * @property int $id
 * @property string $text
 * @property int|null $department_id
 * @property int|null $user_id
 * @property int|null $check_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $active
 */
class CommentCheck extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment_check';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
            [['department_id', 'user_id', 'check_id', 'create_at', 'update_at', 'active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Комментарий',
            'department_id' => 'Department ID',
            'user_id' => 'User ID',
            'check_id' => 'Check ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'active' => 'Active',
        ];
    }
}
