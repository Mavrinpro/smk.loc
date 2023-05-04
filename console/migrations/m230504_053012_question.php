<?php

use yii\db\Migration;

/**
 * Class m230504_053012_question
 */
class m230504_053012_question extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'user_id' => $this->integer(),
            'test_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'right' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('question');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230504_053012_question cannot be reverted.\n";

        return false;
    }
    */
}
