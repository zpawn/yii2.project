<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\controllers;

use Yii;

class PostController extends AppController {

    public function actionTest () {

        $names = ['Ivanov', 'Petrov', 'Sidorov'];

//        $this->debug(Yii::$app);

        return $this->render('test');
    }

} 