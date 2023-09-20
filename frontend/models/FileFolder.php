<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "file_folder".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $file_id
 * @property int|null $department_id
 */
class FileFolder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_folder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'department_id'], 'integer'],
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
            'name' => 'Имя раздела',
            'file_id' => 'File ID',
            'department_id' => 'Отдел',
        ];
    }
}
