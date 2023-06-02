<?php

use yii\db\Migration;

/**
 * Class m230602_072117_add
 */
class m230602_072117_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'fio', $this->string()->after('username'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'fio');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230602_072117_add cannot be reverted.\n";

        return false;
    }
    */
}
