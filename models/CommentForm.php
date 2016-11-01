<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 01.11.2016
 * Time: 6:27
 */

namespace app\models;


use yii\base\Model;

class CommentForm extends Model
{
    public $author;
    public $email;
    public $content;
    public $comment_post;
    public $status;

    public function rules()
    {
        return [

            [['author','email','content'], 'required'],
            [['status','comment_post'], 'integer'],
            ['email', 'email'],
            [['author', 'email'], 'string', 'max' => 255],
        ];

    }

    public function writeComment()
    {
        $comment = new Comment();
        
        $comment->author = $this->author;
        $comment->email = $this->email;
        $comment->content = $this->content;
        $comment->comment_post = $this->comment_post;
        $comment->status = 1;
        return $comment->save();

    }
    public function attributeLabels()
    {
        return [

            'author' => 'Автор:',
            'email' => 'Email:',
            'content' => 'Комментарий:',
            'comment_post' => 'Заголовок',
            'status' => 'Статус',
        ];
    }

}