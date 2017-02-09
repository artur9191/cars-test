<?php

use yii\db\Migration;
use yii\db\Schema;

class m170206_202950_users extends Migration
{
    public function up()
    {

        $this->createTable('users', [
            'id'            =>  Schema::TYPE_PK,
            'name'      =>  Schema::TYPE_STRING . '(50) NOT NULL',
            'surname'      =>  Schema::TYPE_STRING . '(50) NOT NULL',
        ], 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB');

        $this->insert('users', [
            'name'          =>  'Иван',
            'surname'        =>  'Иванович',
        ]);
        $this->insert('users', [
            'name'          =>  'Петр',
            'surname'        =>  'Петрович',
        ]);
        $this->insert('users', [
            'name'          =>  'Олег',
            'surname'        =>  'Сидорович',
        ]);

    }

    public function down()
    {
        echo "m170206_202950_users cannot be reverted.\n";

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
