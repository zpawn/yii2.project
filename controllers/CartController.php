<?php
/**
 * @copyright (c) 2008 - 2017 FF.ua.
 * @author Ilia Makarov <ilia.makarov@me.com>
 */


namespace app\controllers;

use app\models\Product;
use app\models\Cart;
use Yii;

/**
 * Class CartController
 * @package app\controllers
 *
 * Array (
 *      [1] => Array (
 *          [qty] => QTY
 *          [name] => NAME
 *          [price] => PRICE
 *          [img] => IMG
 *      )
 *      [10] => Array (
 *          [qty] => QTY
 *          [name] => NAME
 *          [price] => PRICE
 *          [img] => IMG
 *      )
 *      [qty] => TOTAL_QTY
 *      [sum] => TOTAL_SUM
 * )
 */
class CartController extends AppController {

    public function actionAdd () {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
    }
}