<?php

use yii\db\Migration;

/**
 * Class m230911_092536_business_trip
 */
class m230911_092536_business_trip extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%business_trip}}', [
            'id' => $this->primaryKey(),
            'doctor_id' => $this->integer(),
            'department_id' => $this->integer(),
            'user_id_create' => $this->integer(),
            'user_id_update' => $this->integer(),
            'check_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'start_trip' => $this->integer(),
            'end_trip' => $this->integer(),
            'date_of_departure' => $this->integer(),
            'return_date' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('business_trip');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230911_092536_business_trip cannot be reverted.\n";

        return false;
    }
    */
}
