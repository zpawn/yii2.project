<?php
/**
 * @copyright (c) 2008 - 2017 FF.ua.
 * @author Ilia Makarov <ilia.makarov@me.com>
 */


namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;


class ProductController extends AppController {

    public function actionView ($id) {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);   // lazyLoad
//        $product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();    // eagerLoad
        return $this->render('view', compact('product'));
    }
} 