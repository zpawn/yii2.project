<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\components;

use yii\base\Widget;


class PostFooterWidget extends Widget {

    public $year;

    public function init() {
        parent::init();
        if ($this->year === null) $this->year = date('Y');
    }

    public function run () {
        return $this->render('post', ['year' => $this->year]);
    }
} 