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
            ['name', 'validateDepartment'],
            ['department_id', 'validateDepartment'],
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
            'file_id' => 'Категория файлов',
            'department_id' => 'Отдел',
        ];
    }

    // Проверка есть ли данный раздел документов в отделе (department)
    public function validateDepartment($attribute, $params, $validator)
    {
        $model = $this::find()->where(['name' => $this->name, 'department_id' => $this->department_id])->one();
        if ($this->department_id == $model->department_id) {
            $this->addError('name', 'Раздел (' .$this->name. ') для документов уже есть".');
        }
    }
}
