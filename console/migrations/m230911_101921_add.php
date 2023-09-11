<?php

use yii\db\Migration;

/**
 * Class m230911_101921_add
 */
class m230911_101921_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%doctor}}', 'branch_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('doctor', 'branch_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230911_101921_add cannot be reverted.\n";

        return false;
    }
    */
}
