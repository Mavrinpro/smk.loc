<?php

use yii\db\Migration;

/**
 * Class m230524_061725_add
 */
class m230524_061725_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user_score}}', 'check_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('user_score', 'check_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230524_061725_add cannot be reverted.\n";

        return false;
    }
    */
}
