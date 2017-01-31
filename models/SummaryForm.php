<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 01.11.2016
 * Time: 6:27
 */

namespace app\models;


use yii\base\Model;

class SummaryForm extends Model
{
        public  $id;
        public $name;
        public $surname;
        public $patronymic;
        public $dob;
        public $address;
        public $phone;
        public $email;
        public $target;
        public $experience;
        public $education;
        public $exteducation;
        public $skills;
        public $merit;
    public $status;




    public function rules()
    {
        return [
            [['name', 'surname','status', 'patronymic', 'dob', 'address', 'phone', 'email', 'target', 'experience', 'education', 'exteducation', 'skills', 'merit'], 'required'],
            [[ 'phone'], 'integer'],
            [['experience', 'education', 'exteducation'], 'string'],
            [['email'], 'email'],
            [['name', 'surname', 'patronymic', 'address', 'target', 'skills', 'merit', 'dob'], 'string', 'max' => 255],
        ];
    }
    

    public function writeSummary()
    {
        $summary = new Summary();

        $summary->name = $this->name;
        $summary->surname = $this->surname;
        $summary->patronymic = $this->patronymic;
        $summary->dob = $this->dob;
        $summary->address = $this->address;
        $summary->phone = $this->phone;
        $summary->email = $this->email;
        $summary->target = $this->target;
        $summary->experience = $this->experience;
        $summary->education = $this->education;
        $summary->exteducation = $this->exteducation;
        $summary->skills = $this->skills;
        $summary->merit = $this->merit;
        $summary->status = $this->status;
        return $summary->save();

    }

    public function attributeLabels()
    {
        return [
            
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'dob' => 'Дата Рождения',
            'address' => 'Адресс',
            'phone' => 'Телефон',
            'email' => 'E-Mail',
            'target' => 'Цель',
            'experience' => 'Опыт',
            'education' => 'Образование',
            'exteducation' => 'Дополнительное Образование',
            'skills' => 'Умения',
            'merit' => 'Личные качетсва',
            'status' => 'Статус',
        ];
    }




}