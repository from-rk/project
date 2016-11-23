<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "Request".
 *
 * @property integer $idRequest
 * @property string $fullName
 * @property string $passport
 * @property string $region
 * @property integer $zipcode
 * @property string $fromName
 * @property string $properties
 * @property string $location
 * @property integer $maxPrice
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullName', 'passport', 'region', 'address', 'zipcode', 'location', 'maxPrice','email','tel'], 'required','message' => 'Это обязательное поле'],
            [['zipcode', 'maxPrice'], 'integer','message' => 'Неверно введены данные'],
            [['fullName', 'region', 'fromName', 'location'], 'string', 'max' => 200],
            [['passport'], 'string', 'max' => 100],
            [['properties'], 'string', 'max' => 2000],
            ['email', 'email','message' => 'Некорректно введен email'],
            ['accepted', 'required', 'requiredValue' => 1, 'message' => 'Невозможно продолжить без согласия'],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idRequest' => 'Id Request',
            'fullName' => 'Full Name',
            'passport' => 'Passport',
            'nie' => 'NIE',
            'tel'=> 'Tel',
            'email'=> 'Email',
            'region' => 'Region',
            'address'=> 'Address',
            'zipcode' => 'Zipcode',
            'fromName' => 'From Name',
            'properties' => 'Properties',
            'location' => 'Location',
            'maxPrice' => 'Max Price',
            'accepted' => 'accepted',
            'verifyCode'=> 'verifyCode'
        ];
    }
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }
}
