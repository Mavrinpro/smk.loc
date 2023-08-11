<?php

use yii\db\Migration;

/**
 * Class m230724_055150_files
 */
class m230724_055150_files extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('files', [
            'id'                => $this->primaryKey(),
            'name'              => $this->string(),
            'date_at'           => $this->integer(11),
            'date_end'          => $this->integer(11),
            'user_id'           => $this->integer(11),
            'user_id_update'           => $this->integer(11),
            'department_id'           => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('files');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230724_055150_files cannot be reverted.\n";

        return false;
    }
    */
}
