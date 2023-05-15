<?php

use yii\db\Migration;

/**
 * Class m230515_091141_service_stat
 */
class m230515_091141_service_stat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service_stat}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'service_id' => $this->integer(),
            'department_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'user_id_create' => $this->integer(),
            'user_id_update' => $this->integer(),
            'active' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('service_stat');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230515_091141_service_stat cannot be reverted.\n";

        return false;
    }
    */
}
