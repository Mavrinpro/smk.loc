<?php

use yii\db\Migration;

/**
 * Class m230516_115705_add
 */
class m230516_115705_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%check_list}}', 'phone4', $this->integer()->after('phone3'));
        $this->addColumn('{{%check_list}}', 'phone5', $this->integer()->after('phone4'));
        $this->addColumn('{{%check_list}}', 'phone6', $this->integer()->after('phone5'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('check_list', 'phone3');
        $this->dropColumn('check_list', 'phone4');
        $this->dropColumn('check_list', 'phone5');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230516_115705_add cannot be reverted.\n";

        return false;
    }
    */
}
