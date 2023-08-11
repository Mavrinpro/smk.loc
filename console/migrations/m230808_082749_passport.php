<?php

use yii\db\Migration;

/**
 * Class m230808_082749_passport
 */
class m230808_082749_passport extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%passport}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'department_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'user_id_create' => $this->integer(),
            'user_id_update' => $this->integer(),
            'active' => $this->integer(),
            'send_user_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('passport');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230808_082749_passport cannot be reverted.\n";

        return false;
    }
    */
}
