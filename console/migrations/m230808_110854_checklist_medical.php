<?php

use yii\db\Migration;

/**
 * Class m230808_110854_checklist_medical
 */
class m230808_110854_checklist_medical extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%checklist_medical}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
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
        $this->dropTable('checklist_medical');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230808_110854_checklist_medical cannot be reverted.\n";

        return false;
    }
    */
}
