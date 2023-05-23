<?php

use yii\db\Migration;

/**
 * Class m230523_063206_user_score
 */
class m230523_063206_user_score extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_score}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'user_id' => $this->integer(),
            'create_at' => $this->integer(),
            'score' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('user_score');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230523_063206_user_score cannot be reverted.\n";

        return false;
    }
    */
}
