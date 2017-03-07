<?php
/**
 * @copyright (c) 2008 - 2017 FF.ua.
 * @author Ilia Makarov <ilia.makarov@me.com>
 */


namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord {

    public function addToCart ($product, $qty = 1) {
        echo 'Worked!';
    }
} 