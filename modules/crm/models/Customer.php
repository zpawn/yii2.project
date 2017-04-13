<?php

namespace app\modules\crm\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "crm_customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $birth_day
 * @property string $note
 *
 * @property Phone[] $phones
 */
class Customer extends ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName () {
        return 'crm_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id', 'number'],
            [['birth_day'], 'date', 'format' => 'Y.m.d'],
            [['note'], 'safe'],
            [['name'], 'string', 'max' => 255],
            ['name', 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'birth_day' => 'Birth Day',
            'note' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhones()
    {
        return $this->hasMany(Phone::className(), ['customer_id' => 'id']);
    }
}
