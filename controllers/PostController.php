<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\controllers;

use Yii;

class PostController extends AppController {

    public $layout = 'basic';

    public function beforeAction ($action) {
        if ($action->id == 'index') {
            // Отключаем проверку токена при отправки формы
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex () {
        if (Yii::$app->request->isAjax) {
//            debug($_REQUEST);
            debug(Yii::$app->request->post());
        } else {
            return $this->render('index');
        }
    }

    public function actionShow () {
        // template for this action
        //$this->layout = 'basic';

        $this->view->title = 'One Article';
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'ключевые фразы'
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'описание страницы'
        ]);

        return $this->render('show');
    }
} 