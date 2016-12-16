<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property string $author
 * @property string $email
 * @property string $content
 * @property integer $status
 */
class Comment extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%comment}}';
    }

    public function rules()
    {
        return [
            [['author', 'email', 'content', 'comment_post', 'status'], 'required'],
            [['content'], 'string'],
            [['status','comment_post', 'created_at'], 'integer'],
            [['author', 'email'], 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Автор',
            'email' => 'Email',
            'content' => 'Комментарий',
            'comment_post' => 'Заголовок',
            'created_at' => 'Создан',
            'status' => 'Статус',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }
    
    

    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'comment_post']); //id - ключ. comment_post - значения.
    }

}
