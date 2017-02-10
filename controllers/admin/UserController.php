<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\controllers\admin;

use app\controllers\AppController;

class UserController extends AppController {

    public function actionIndex () {
        return $this->render('index');
    }
} 