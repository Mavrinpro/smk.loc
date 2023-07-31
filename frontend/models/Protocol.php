<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "protocol".
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
class Protocol extends \yii\db\ActiveRecord
{
    const DOCUMENT_ARCHIVE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'protocol';
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
            'name' => 'Имя файла',
            'department_id' => 'Department ID',
            'create_at' => 'Дата создания',
            'update_at' => 'Дата обновления',
            'user_id_create' => 'User Id Create',
            'user_id_update' => 'Кто обновил',
            'active' => 'Active',
            'send_user_id' => 'Кому передан',
        ];
    }

    public function getUser(){
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id_create']);
    }

    public function getDepartment(){
        return $this->hasOne(\app\models\Department::className(), ['id' => 'department_id']);
    }

    public function Brancher($id){
        return \app\models\Branch::find()->where(['id' => $id])->one();
    }

    // Уведомление на email о передаче файла
    public function sendEmailnoty($user)
    {
      
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'nity-html', 'text' => 'nity-html'],
            ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo('g.katarakta@gmail.com')
            ->setSubject('yyyyyyyyyyyyyyyyyyyy ' . Yii::$app->name)
            ->send();
    }
}
