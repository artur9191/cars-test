<?php

use yii\db\Migration;
use yii\db\Schema;

class m170206_203056_car_user extends Migration
{
    public function safeUp()
    {
        $this->createTable('car_user', [
            'car_id' => Schema::TYPE_INTEGER,
            'user_id' => Schema::TYPE_INTEGER
        ]);

        $this->addForeignKey("cars_car_user_fk",  "car_user", "car_id",  "cars",  "id",  'CASCADE');
        $this->addForeignKey("users_car_user_fk", "car_user", "user_id", "users", "id",  'CASCADE');


    }

    public function down()
    {
        $this->dropTable('car_user');

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
