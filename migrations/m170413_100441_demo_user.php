<?php

use yii\db\Migration;

class m170413_100441_demo_user extends Migration
{
    public function up () {
        Yii::$app->db->createCommand()->insert('{{%user}}', [
            'auth_key' => Yii::$app->security->generateRandomString(),
            'username' => 'zpawn',
            'password' => Yii::$app->security->generatePasswordHash('trewq1234')
        ])->execute();
        echo "==> created admin user\n";
    }

    public function down()
    {
        echo "m170413_100441_demo_user cannot be reverted.\n";

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
