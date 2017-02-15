<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord {

    public static function tableName () {
        return 'products';
    }
} 