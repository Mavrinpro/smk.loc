<?php

use yii\db\Migration;

/**
 * Class m230613_084117_add
 */
class m230613_084117_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%notyfication}}', 'read', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('notyfication', 'read');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230613_084117_add cannot be reverted.\n";

        return false;
    }
    */
}
