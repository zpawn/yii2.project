<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\controllers;

use Yii;

class PostController extends AppController {

    public $layout = 'basic';

    public function actionIndex () {
        if (Yii::$app->request->isAjax) {
            echo $_REQUEST;
            return 'test';
        } else {
            return $this->render('index');
        }
    }

    public function actionShow () {
        // template for this action
        //$this->layout = 'basic';
        return $this->render('show');
    }
} 