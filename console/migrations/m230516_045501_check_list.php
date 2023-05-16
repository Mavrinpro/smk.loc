<?php

use yii\db\Migration;

/**
 * Class m230516_045501_check_list
 */
class m230516_045501_check_list extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%check_list}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'text1' => $this->string(),
            'text2' => $this->string(),
            'text3' => $this->string(),
            'user_id' => $this->integer(),
            'service_id' => $this->integer(),
            'department_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'user_id_create' => $this->integer(),
            'user_id_update' => $this->integer(),
            'active' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('check_list');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230516_045501_check_list cannot be reverted.\n";

        return false;
    }
    */
}
