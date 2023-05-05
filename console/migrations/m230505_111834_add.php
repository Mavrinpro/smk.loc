<?php

use yii\db\Migration;

/**
 * Class m230505_111834_add
 */
class m230505_111834_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'company_id', $this->integer());
        $this->addColumn('{{%user}}', 'city_id', $this->integer());
        $this->addColumn('{{%user}}', 'department_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230505_111834_add cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230505_111834_add cannot be reverted.\n";

        return false;
    }
    */
}
