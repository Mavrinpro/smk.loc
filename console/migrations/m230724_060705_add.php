<?php

use yii\db\Migration;

/**
 * Class m230724_060705_add
 */
class m230724_060705_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%files}}', 'title', $this->integer()->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('files', 'title');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230724_060705_add cannot be reverted.\n";

        return false;
    }
    */
}
