<?php

use yii\db\Migration;

/**
 * Class m230516_051012_add
 */
class m230516_051012_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%check_list}}', 'score', $this->integer());
        $this->addColumn('{{%check_list}}', 'phone1', $this->integer());
        $this->addColumn('{{%check_list}}', 'phone2', $this->integer());
        $this->addColumn('{{%check_list}}', 'phone3', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('check_list', 'score');
        $this->dropColumn('check_list', 'phone1');
        $this->dropColumn('check_list', 'phone2');
        $this->dropColumn('check_list', 'phone3');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230516_051012_add cannot be reverted.\n";

        return false;
    }
    */
}
