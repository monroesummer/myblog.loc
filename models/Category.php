<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Категория',
            'description' => 'Описание',
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['category_id' => 'id']);

    }
    
}
    
//    public function getComments(){
//        return $this->hasMany(Comment::className(), ['comment_product' => 'id']);//comment_product - ключ,  id - value
//
//        //comment_product комментария = id продукта
//  }
