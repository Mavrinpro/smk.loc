<?php

use yii\db\Migration;

/**
 * Class m230609_121011_add
 */
class m230609_121011_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'telegram_id', $this->integer()->after('fio'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'telegram_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230609_121011_add cannot be reverted.\n";

        return false;
    }
    */
}
