<?php

use yii\db\Migration;

/**
 * Class m230517_091320_add
 */
class m230517_091320_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%check_list}}', 'score3', $this->integer()->after('score2'));
        $this->addColumn('{{%check_list}}', 'score4', $this->integer()->after('score3'));
        $this->addColumn('{{%check_list}}', 'score5', $this->integer()->after('score4'));
        $this->addColumn('{{%check_list}}', 'score6', $this->integer()->after('score5'));
        $this->addColumn('{{%check_list}}', 'score7', $this->integer()->after('score6'));
        $this->addColumn('{{%check_list}}', 'score8', $this->integer()->after('score7'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('check_list', 'score3');
        $this->dropColumn('check_list', 'score4');
        $this->dropColumn('check_list', 'score5');
        $this->dropColumn('check_list', 'score6');
        $this->dropColumn('check_list', 'score7');
        $this->dropColumn('check_list', 'score8');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230517_091320_add cannot be reverted.\n";

        return false;
    }
    */
}
