<?php
/**
 * (c) 2017 FF.ua. Lev Boyko, Ilya M.
 */


namespace app\controllers;

use yii\web\Controller;


class AppController extends Controller {

    protected function setMeta ($title = null, $keywords = '', $description = '') {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'contents' => $keywords]);
        $this->view->registerMetaTag(['name' => 'description', 'contents' => $description]);
    }
} 