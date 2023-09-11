<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%doctor}}`.
 */
class m230911_100843_drop_doctor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%doctor}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('{{%doctor}}', [
            'id' => $this->primaryKey(),
        ]);
    }
}
