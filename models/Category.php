<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord {

    public static function tableName () {
        return 'categories';
    }

    /**
     * analog mysql JOIN:
     * LEFT JOIN products ON products.parent = categories.id
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts () {
        return $this->hasMany(Product::className(), ['parent' => 'id']);
    }
} 