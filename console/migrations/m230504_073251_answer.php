<?php

use yii\db\Migration;

/**
 * Class m230504_073251_answer
 */
class m230504_073251_answer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%answer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'user_id' => $this->integer(),
            'test_id' => $this->integer(),
            'question_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'answer_right' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('answer', 'right', 'answer_right');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230504_073251_answer cannot be reverted.\n";

        return false;
    }
    */
}
