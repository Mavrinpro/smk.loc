<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property int|null $department_id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $user_id_create
 * @property int|null $user_id_update
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['department_id', 'create_at', 'update_at', 'user_id_create', 'user_id_update'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['text'], 'safe'],
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
            'text' => 'Текст',
            'department_id' => 'Department ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'user_id_create' => 'User Id Create',
            'user_id_update' => 'User Id Update',
        ];
    }
    
    // Create doc
    public function createDoc($title, $body)
    {
        $filename = 'demo'.time().'.doc';
        header("Content-type: application/vnd.ms-word");
        header( "Content-Disposition: attachment; filename=".basename($filename));
        header( "Content-Description: File Transfer");
        @readfile($filename);

        $content = '<html>'
            .'<head><meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">'
            .'<title>35345345</title>'
            .'<style>
        @page
        {
            font-family: Arial;
            size:215.9mm 279.4mm;  /* A4 */
            margin:14.2mm 17.5mm 14.2mm 16mm; /* Margins: 2.5 cm on each side */
        }
        h2 { font-family: Arial; font-size: 18px; text-align:center; }
        p.para {font-family: Arial; font-size: 13.5px; text-align: justify;}
        </style>'
            .'</head>'
            .'<body>'
            .'<h2>'.$title.'</h2><br/>'
            .'<p class="para">'
            .$body
            .'</p>'
            .'</body>'
            .'</html>';

        return $content;
    }

    public function getDepartment()
    {
        return $this->hasOne(\app\models\Department::class, ['id' => 'department_id']);
    }
}
