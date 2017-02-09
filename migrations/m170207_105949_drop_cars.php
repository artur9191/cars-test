<?php

use yii\db\Migration;

class m170207_105949_drop_cars extends Migration
{
    public function up()
    {
        //$this->dropTable('car_user');
    }

    public function down()
    {
        echo "m170207_105949_drop_cars cannot be reverted.\n";

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
