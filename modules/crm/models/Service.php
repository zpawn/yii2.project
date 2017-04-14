<?php

namespace app\modules\crm\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "crm_service".
 *
 * @property integer $id
 * @property string $name
 * @property integer $hourly_rate
 */
class Service extends ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName () {
        return 'crm_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hourly_rate'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'hourly_rate' => 'Hourly Rate',
        ];
    }
}
