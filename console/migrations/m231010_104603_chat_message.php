<?php

use yii\db\Migration;

/**
 * Class m231010_104603_chat_message
 */
class m231010_104603_chat_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chat_message}}', [
            'id' => $this->primaryKey(),
            'message_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('chat_message');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231010_104603_chat_message cannot be reverted.\n";

        return false;
    }
    */
}
