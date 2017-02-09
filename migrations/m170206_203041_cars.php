<?php

use yii\db\Migration;
use yii\db\Schema;

class m170206_203041_cars extends Migration
{
    public function up()
    {
        $this->createTable('cars', [
            'id'         =>  Schema::TYPE_PK,
            'model'      =>  Schema::TYPE_STRING . '(50) NOT NULL',
            'color'      =>  Schema::TYPE_SMALLINT . '(50) NOT NULL',
        ], 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB');

        $this->insert('cars', [
            'model'          =>  'BMV',
            'color'        =>  '1',
        ]);
        $this->insert('cars', [
            'model'          =>  'VAZ',
            'color'        =>  '2',
        ]);
        $this->insert('cars', [
            'model'          =>  'YAZ',
            'color'        =>  '3',
        ]);
        $this->insert('cars', [
        'model'          =>  'LEXUS',
        'color'        =>  '4',
    ]);
    }

    public function down()
    {
        echo "m170206_203041_cars cannot be reverted.\n";

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
