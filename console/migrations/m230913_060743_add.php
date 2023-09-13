<?php

use yii\db\Migration;

/**
 * Class m230913_060743_add
 */
class m230913_060743_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%business_trip}}', 'branch_id', $this->integer()->after('department_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('business_trip', 'branch_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230913_060743_add cannot be reverted.\n";

        return false;
    }
    */
}
