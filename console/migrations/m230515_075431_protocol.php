<?php

use yii\db\Migration;

/**
 * Class m230515_075431_protocol
 */
class m230515_075431_protocol extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%protocol}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'department_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'user_id_create' => $this->integer(),
            'user_id_update' => $this->integer(),
            'active' => $this->integer(),
            'send_user_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('protocol');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230515_075431_protocol cannot be reverted.\n";

        return false;
    }
    */
}
