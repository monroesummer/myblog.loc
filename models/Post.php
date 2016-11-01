<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $category_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Post extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'category_id',   'status'], 'required'],
            [['content'], 'string'],
            [['category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Контент',
            'category_id' => 'Категория',
            'status' => 'Статус',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }


    public function behaviors()
    {
        return [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }


    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']); 
    }
    
    public function getComments(){
        return $this->hasMany(Comment::className(), ['comment_post' => 'id']);//comment_product - ключ,  id - value
        //comment_product комментария = id продукта
    }


    



}
