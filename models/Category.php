<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\models;

use yii\db\ActiveRecord;


class Category extends ActiveRecord {

    public static function tableName () {
        return 'category';
    }

    public function getProducts () {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
} 