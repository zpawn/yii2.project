<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\models;
use yii\db\ActiveRecord;


class Post extends ActiveRecord {

    public static function tableName () {
        return 'posts';
    }

    public function attributeLabels () {
        return [
            'name' => 'Lastname, Firstname',
            'email' => 'E-mail',
            'text' => 'Message'
        ];
    }

    public function rules () {
        return [
            [['name', 'email'], 'required'],
            [['name', 'email', 'text'], 'trim'],
            ['email', 'email'],
        ];
    }
} 