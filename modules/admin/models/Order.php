<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $qty
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Order extends ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName () {
        return 'order';
    }

    public function getOrderItems () {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules () {
        return [
            [['created_at', 'updated_at', 'qty', 'sum', 'name', 'email', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'string'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels () {
        return [
            'id' => '№ заказа',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
            'qty' => 'Кол-во',
            'sum' => 'Сумма',
            'status' => 'Status',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
        ];
    }
}
