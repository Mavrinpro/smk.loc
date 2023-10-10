<?php

use yii\db\Migration;

/**
 * Class m230927_061803_add
 */
class m230927_061803_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%chat}}', 'ip_adress', $this->integer()->after('user_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('chat', 'ip_adress');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230927_061803_add cannot be reverted.\n";

        return false;
    }
    */
}
