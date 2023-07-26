<?php

use yii\db\Migration;

/**
 * Class m230726_110831_add
 */
class m230726_110831_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'avatar', $this->integer()->after('telegram_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'avatar');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230726_110831_add cannot be reverted.\n";

        return false;
    }
    */
}
