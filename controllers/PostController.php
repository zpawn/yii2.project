<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\Category;

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

        // Update
//        $post = Post::findOne(3);
//        $post->email = 'armen.tamzarian@gmail.com';
//        $post->save();

        // Delete
//        $post->delete();
//        Post::deleteAll(['>', 'id', 2]);
//        Post::deleteAll();  // Remove all data in table

        $post = new Post();

        if ($post->load(Yii::$app->request->post())) {
            if ($post->save()) {
                Yii::$app->session->setFlash('success', 'data load success');
                // for clear form from data
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'data load error');
            }
        }

        $this->view->title = 'All Articles';
        return $this->render('index', compact('post'));
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

        // Lazy Load
        // uncommented and see how count query into db (when many data)
        // $categories = Category::find()->all();

        // Eager Load
        $categories = Category::find()->with('products')->all();

        return $this->render('show', compact('categories'));
    }
} 