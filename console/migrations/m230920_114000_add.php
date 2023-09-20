<?php

use yii\db\Migration;

/**
 * Class m230920_114000_add
 */
class m230920_114000_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%files}}', 'file_folder', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('files', 'file_folder');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230920_114000_add cannot be reverted.\n";

        return false;
    }
    */
}
