<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\controllers\admin;

use yii\web\Controller;

class UserController extends Controller {

    public function actionIndex () {
        return $this->render('index');
    }
} 