<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sop".
 *
 * @property int $id
 * @property string $name
 * @property int|null $department_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $user_id_create
 * @property int|null $user_id_update
 * @property int|null $active
 * @property int|null $send_user_id
 */
class Sop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['department_id', 'create_at', 'update_at', 'user_id_create', 'user_id_update', 'active', 'send_user_id'], 'integer'],
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
            'department_id' => 'Department ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'user_id_create' => 'User Id Create',
            'user_id_update' => 'User Id Update',
            'active' => 'Active',
            'send_user_id' => 'Send User ID',
        ];
    }
    public function getUser(){
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id_create']);
    }

    public function getUsersend(){
        return $this->hasOne(\common\models\User::className(), ['id' => 'send_user_id']);
    }

    public function getDepartment(){
        return $this->hasOne(\app\models\Department::className(), ['id' => 'department_id']);
    }

    public function Brancher($id){
        return \app\models\Branch::find()->where(['id' => $id])->one();
    }
}
