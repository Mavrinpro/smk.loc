<?php

use yii\db\Migration;

/**
 * Class m230613_083603_notyfication
 */
class m230613_083603_notyfication extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notyfication}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'user_id' => $this->integer(),
            'user_create_id' => $this->integer(),
            'create_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('notyfication');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230613_083603_notyfication cannot be reverted.\n";

        return false;
    }
    */
}
