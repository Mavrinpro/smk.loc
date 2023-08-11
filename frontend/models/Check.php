<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "check".
 *
 * @property int $id
 * @property int $department_id
 * @property string|null $name
 */
class Check extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'check';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['department_id'], 'safe'],
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
            'name' => 'Название',
        ];
    }
    public function getTesto()
    {
        return $this->hasMany(\app\models\CheckList::class, ['service_id' => 'id']);
    }
}
