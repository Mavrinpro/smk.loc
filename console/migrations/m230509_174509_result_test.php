<?php

use yii\db\Migration;

/**
 * Class m230509_174509_result_test
 */
class m230509_174509_result_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%result_test}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'test_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'question_id' => $this->integer(),
            'answer_id' => $this->integer(),
            'time_test' => $this->integer(),
            'completed' => $this->integer(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('result_test');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230509_174509_result_test cannot be reverted.\n";

        return false;
    }
    */
}
