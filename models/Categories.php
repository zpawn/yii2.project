<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $title
 * @property integer $parent
 * @property string $alias
 */
class Categories extends ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName () {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules () {
        return [
            [['title', 'parent', 'alias'], 'required'],
            [['parent'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['alias'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels () {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'parent' => 'Parent',
            'alias' => 'Alias',
        ];
    }
}
