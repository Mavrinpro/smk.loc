<?php

use yii\db\Migration;

/**
 * Class m230503_071900_test
 */
class m230503_071900_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'user_id' => $this->integer(),
            'result' => $this->string(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'action' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('test');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230503_071900_test cannot be reverted.\n";

        return false;
    }
    */
}
