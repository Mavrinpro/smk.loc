<?php

use yii\db\Migration;

/**
 * Class m230517_082856_add
 */
class m230517_082856_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%check}}', 'department_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('check', 'department_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230517_082856_add cannot be reverted.\n";

        return false;
    }
    */
}
