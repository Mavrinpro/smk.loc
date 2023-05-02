<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property int|null $document_id
 * @property int|null $department_id
 * @property int|null $branch_id
 * @property int|null $user_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $user_id_update
 * @property int|null $action
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_id', 'department_id', 'branch_id', 'user_id', 'create_at', 'update_at', 'user_id_update', 'action'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_id' => 'Document ID',
            'department_id' => 'Department ID',
            'branch_id' => 'Branch ID',
            'user_id' => 'User ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'user_id_update' => 'User Id Update',
            'action' => 'Action',
        ];
    }
}
