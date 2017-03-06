<?php
/**
 * @copyright (c) 2008 - 2017 FF.ua.
 * @author Ilia Makarov <ilia.makarov@me.com>
 */


namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\web\HttpException;


class ProductController extends AppController {

    public function actionView ($id) {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);   // lazyLoad

        if ($product === null) {
            throw new HttpException(404, 'Product not found');
        }

        $hits = Product::find()->where(['hit' => '1'])->limit(5)->all();

        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits'));
    }
} 