<?php

use yii\db\Migration;

/**
 * Class m230605_082432_add
 */
class m230605_082432_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%result_test}}', 'ans_id', $this->string()->after('answer_text'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('result_test', 'ans_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230605_082432_add cannot be reverted.\n";

        return false;
    }
    */
}
