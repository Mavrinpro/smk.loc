<?php

use yii\db\Migration;

/**
 * Class m230425_072719_page
 */
class m230425_072719_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'department_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'user_id_create' => $this->integer(),
            'user_id_update' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230425_072719_page cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230425_072719_page cannot be reverted.\n";

        return false;
    }
    */
}
