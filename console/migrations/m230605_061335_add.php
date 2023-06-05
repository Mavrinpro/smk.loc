<?php

use yii\db\Migration;

/**
 * Class m230605_061335_add
 */
class m230605_061335_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%result_test}}', 'answer_text', $this->string()->after('answer_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('result_test', 'answer_text');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230605_061335_add cannot be reverted.\n";

        return false;
    }
    */
}
