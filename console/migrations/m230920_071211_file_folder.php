<?php

use yii\db\Migration;

/**
 * Class m230920_071211_file_folder
 */
class m230920_071211_file_folder extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%file_folder}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'file_id' => $this->integer(),
            'department_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('file_folder');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230920_071211_file_folder cannot be reverted.\n";

        return false;
    }
    */
}
