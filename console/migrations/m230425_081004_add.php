<?php

use yii\db\Migration;

/**
 * Class m230425_081004_add
 */
class m230425_081004_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%page}}', 'branch_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230425_081004_add cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230425_081004_add cannot be reverted.\n";

        return false;
    }
    */
}
