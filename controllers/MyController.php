<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/

namespace app\controllers;

use yii\web\Controller;

class MyController extends Controller {

    public function actionIndex ($id = null) {
        $hello = 'Hello, World!';
        $names = ['Ivanov', 'Petrov', 'Sidorov'];
//        return $this->render('index', [
//            'hello' => $hi,
//            'names' => $names
//        ]);

        if (!$id) $id = 'test';

        return $this->render('index', compact('hello', 'names', 'id'));
    }
} 