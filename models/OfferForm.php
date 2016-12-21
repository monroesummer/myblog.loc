<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 01.11.2016
 * Time: 6:27
 */

namespace app\models;


use yii\base\Model;

class OfferForm extends Model
{
    public $id;
    public $title;
    public $content;
    public $category_id;
    public $status;



    public function rules()
    {
        return [

            [['title','content', 'category_id', 'status'], 'required'],
            [['status','category_id', 'id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['content'], 'string'],
        ];

    }

    public function writeOffer()
    {
        $offer = new Post();
        
        $offer->title = $this->title;
        $offer->content = $this->content;
        $offer->category_id = $this->category_id;
        $offer->status = $this->status;
        return $offer->save();

    }
    public function attributeLabels()
    {
        return [

            'title' => 'Заголовок:',
            'content' => 'Текст:',
            'category_id' => 'Категория:',
            'status' => 'Статус',
        ];
    }




}