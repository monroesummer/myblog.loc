<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m161020_213826_create_tables extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }



        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . ' NOT NULL',
            'token' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL'
        ], $tableOptions);
        $this->createIndex('username', '{{%user}}', 'username', true);




        $this->createTable('{{%category}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_STRING
        ], $tableOptions);
        $this->createIndex('name', '{{%category}}', 'name', true);

        

        $this->createTable('{{%post}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'category_id' => Schema::TYPE_SMALLINT . ' unsigned NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL'
        ], $tableOptions);
        $this->createIndex('status', '{{%post}}', 'status');


        
        $this->createTable('{{%comment}}', [
            'id' => Schema::TYPE_PK,
            'author' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'comment_post' => Schema::TYPE_SMALLINT . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL'

        ], $tableOptions);
        $this->createIndex('status', '{{%comment}}', 'status');


        $this->execute($this->addUserSql());
    }


    private function addUserSql()
    {
        $password = Yii::$app->security->generatePasswordHash('admin');
        $auth_key = Yii::$app->security->generateRandomString();
        $token = Yii::$app->security->generateRandomString() . '_' . time();
        return "INSERT INTO {{%user}} (`username`, `email`, `password`, `auth_key`, `token`) VALUES ('admin', 'admin@myblog.loc', '$password', '$auth_key', '$token')";
    }


    public function safeDown()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%post}}');
        $this->dropTable('{{%comment}}');
        $this->dropTable('{{%category}}');
    }
}
