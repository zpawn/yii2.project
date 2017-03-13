<?php
/**
 * @copyright (c) 2008 - 2017 FF.ua.
 * @author Ilia Makarov <ilia.makarov@me.com>
 */


namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord {

    public function behaviors () {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function addToCart ($product, $qty = 1) {

        $mainImage = $product->getImage();

        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $mainImage->getUrl('x50')
            ];
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + ($qty * $product->price) : ($qty * $product->price);
    }

    public function removeFromCart ($id) {

        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }

        $removedProducts = $_SESSION['cart'][$id];
        $_SESSION['cart.qty'] -= $removedProducts['qty'];
        $_SESSION['cart.sum'] -= $removedProducts['price'] * $removedProducts['qty'];
        unset($_SESSION['cart'][$id], $removedProducts);

        return true;
    }
} 