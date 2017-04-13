<?php

use yii\db\Migration;

class m170413_173258_init_services_table extends Migration {
    public function up () {
        echo "create table service \n";
        $this->createTable('crm_service', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->unique(),
            'hourly_rate' => $this->integer()
        ]);
    }

    public function down () {
        echo "drop table service\n";
        $this->dropTable('crm_service');
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
