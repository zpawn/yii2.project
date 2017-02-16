<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\components;

use yii\base\Widget;


class MyWidget extends Widget {

    public $name;

    public function init () {
        parent::init();
        if ($this->name === null) $this->name = 'Guest';
    }

    public function run () {
        return "<h3>{$this->name}, Hello, World!</h3>";
    }
} 