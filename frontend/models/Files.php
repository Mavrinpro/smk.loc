<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $title
 * @property int|null $date_at
 * @property int|null $date_end
 * @property int|null $user_id
 * @property int|null $user_id_update
 * @property int|null $department_id
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_at', 'date_end', 'user_id', 'user_id_update', 'department_id'], 'integer'],
            [['name', 'title'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'date_at' => 'Date At',
            'date_end' => 'Date End',
            'user_id' => 'User ID',
            'user_id_update' => 'User Id Update',
            'department_id' => 'Department ID',
        ];
    }
}
