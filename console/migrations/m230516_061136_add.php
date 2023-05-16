<?php

use yii\db\Migration;

/**
 * Class m230516_061136_add
 */
class m230516_061136_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%check_list}}', 'score2', $this->integer()->after('score'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('check_list', 'score2');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230516_061136_add cannot be reverted.\n";

        return false;
    }
    */
}
