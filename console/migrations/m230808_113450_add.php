<?php

use yii\db\Migration;

/**
 * Class m230808_113450_add
 */
class m230808_113450_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%checklist_medical}}', 'check_id', $this->integer()->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('checklist_medical', 'check_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230808_113450_add cannot be reverted.\n";

        return false;
    }
    */
}
