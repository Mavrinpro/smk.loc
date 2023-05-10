<?php

use yii\db\Migration;

/**
 * Class m230510_073644_add
 */
class m230510_073644_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%test}}', 'department_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%test}}', 'department_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230510_073644_add cannot be reverted.\n";

        return false;
    }
    */
}
