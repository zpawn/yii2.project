<?php

use yii\db\Migration;

class m170413_132201_init_customer_table extends Migration {
    public function up () {
        echo "create table 'customer' \n";
        $this->createTable('crm_customer', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull()->defaultValue(''),
            'birth_day' => $this->date(),
            'note' => $this->text()
        ]);
    }

    public function down () {
        echo "drop table 'customer' \n";
        $this->dropTable('crm_customer');
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
