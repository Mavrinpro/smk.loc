<?php

use yii\db\Migration;

/**
 * Class m230502_112206_history
 */
class m230502_112206_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history}}', [
            'id' => $this->primaryKey(),
            'document_id' => $this->integer(),
            'department_id' => $this->integer(),
            'branch_id' => $this->integer(),
            'user_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'user_id_update' => $this->integer(),
            'action' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230502_112206_history cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230502_112206_history cannot be reverted.\n";

        return false;
    }
    */
}
