<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\controllers;

use Yii;
use app\models\TestForm;

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
            debug(Yii::$app->request->post());
            return 'test';
        }

        $model = new TestForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                Yii::$app->session->setFlash('success', 'data load success');
                // for clear form from data
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'data load error');
            }
        }

        $this->view->title = 'All Articles';
        return $this->render('index', compact('model'));
    }

    public function actionShow () {

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