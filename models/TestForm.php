<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\models;
use yii\base\Model;


class TestForm extends Model {

    public $name;
    public $email;
    public $text;

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
            ['email', 'email'],
            ['name', 'string', 'length' => [2, 5]],
            ['name', 'myRule'],
            ['text', 'trim']
        ];
    }

    /**
     * Create custom validate rule. This validate work on server
     * @see http://www.yiiframework.com/doc-2.0/guide-input-validation.html#creating-validators
     */
    public function myRule ($attribute) {
        if (!in_array($this->$attribute, ['hello', 'world'])) {
            $this->addError($attribute, 'Name not be Hello, World!');
        }
    }
} 