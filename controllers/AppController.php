<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\controllers;

use yii\web\Controller;


class AppController extends Controller {

    public function debug ($params) {
        echo '<pre>'. print_r($params, true) .'</pre>';
    }

}