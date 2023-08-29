<?php

use yii\db\Migration;

/**
 * Class m230829_071426_comment_check
 */
class m230829_071426_comment_check extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment_check}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'department_id' => $this->integer(),
            'user_id' => $this->integer(),
            'check_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'active' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comment_check');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230829_071426_comment_check cannot be reverted.\n";

        return false;
    }
    */
}
