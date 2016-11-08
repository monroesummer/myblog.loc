<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m161020_213826_create_tables extends Migration
{
    public function safeUp()
    {

// blog_category
        $this->createTable('{{%blog_category}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . "(255) NOT NULL",
            'description' => Schema::TYPE_TEXT . " NULL",
        ], $this->tableOptions);

// blog_comment
        $this->createTable('{{%blog_comment}}', [
            'id' => Schema::TYPE_PK,
            'author' => Schema::TYPE_STRING . "(255) NOT NULL",
            'email' => Schema::TYPE_STRING . "(255) NOT NULL",
            'content' => Schema::TYPE_TEXT . " NOT NULL",
            'comment_post' => Schema::TYPE_SMALLINT . "(6) UNSIGNED NOT NULL",
            'created_at' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'status' => Schema::TYPE_SMALLINT . "(6) NOT NULL",
        ], $this->tableOptions);

// blog_migration
        $this->createTable('{{%blog_migration}}', [
            'version' => Schema::TYPE_STRING . "(180) NOT NULL",
            'apply_time' => Schema::TYPE_INTEGER . "(11) NULL",
            'PRIMARY KEY (version)',
        ], $this->tableOptions);

// blog_post
        $this->createTable('{{%blog_post}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . "(255) NOT NULL",
            'content' => Schema::TYPE_TEXT . " NOT NULL",
            'category_id' => Schema::TYPE_SMALLINT . "(6) UNSIGNED NOT NULL",
            'status' => Schema::TYPE_SMALLINT . "(6) NOT NULL",
            'created_at' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'updated_at' => Schema::TYPE_INTEGER . "(11) NOT NULL",
        ], $this->tableOptions);

// blog_user
        $this->createTable('{{%blog_user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . "(255) NOT NULL",
            'password' => Schema::TYPE_STRING . "(255) NOT NULL",
            'auth_key' => Schema::TYPE_STRING . "(255) NOT NULL",
            'token' => Schema::TYPE_STRING . "(255) NOT NULL",
            'email' => Schema::TYPE_STRING . "(255) NOT NULL",
        ], $this->tableOptions);
    }

}
