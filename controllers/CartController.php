<?php
/**
 * @copyright (c) 2008 - 2017 FF.ua.
 * @author Ilia Makarov <ilia.makarov@me.com>
 */


namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;

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

    public function actionShow () {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionAdd () {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);

        if (!Yii::$app->request->isAjax) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear () {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionRemove () {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->removeFromCart($id);

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView () {
        $session = Yii::$app->session;
        $session->open();

        $order = new Order();

        if ($order->load(Yii::$app->request->post())) {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];

            if ($order->save()) {
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ordered success');
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ordered error');
            }
        }

        $this->setMeta('This is Cart');
        return $this->render('view', compact('session', 'order'));
    }

    protected function saveOrderItems ($items, $order_id) {
        foreach ($items as $id => $item) {
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['price'] * $item['qty'];
            $order_items->save();
        }
    }
}