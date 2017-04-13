<?php

use yii\db\Migration;

class m170413_132805_init_phones_table extends Migration {
    public function up () {
        
        echo "create table 'phone' \n";
        $this->createTable('crm_phone', [
            'id' => $this->primaryKey()->unsigned(),
            'customer_id' => $this->integer(11)->unsigned()->notNull(),
            'number' => $this->string()
        ]);
        echo "create ForeignKey customer.id->phone.customer_id \n";
        $this->addForeignKey('fk-customer__phone', '{{%phone}}', 'customer_id', '{{%customer}}', 'id');
    }

    public function down () {

        echo "drop ForeignKey customer.id->phone.customer_id \n";
        $this->dropForeignKey('fk-customer__phone', '{{%phone}}');

        echo "drop table 'phone' \n";
        $this->dropTable('crm_phone');
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
