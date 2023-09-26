<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $name
 * @property int|null $branch_id
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['branch_id'], 'integer'],
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
            'name' => 'Название отдела',
            'branch_id' => 'Branch ID',
        ];
    }

    // Получаем отделы
    public function Department($id)
    {
        return Department::find()->where(['branch_id' => $id])->all();
    }
    public function getUser(){
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
   
}
