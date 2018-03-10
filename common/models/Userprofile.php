<?php

namespace common\models;

use Yii;
use app\models\Product;
use app\models\User;
/**
 * This is the model class for table "userprofile".
 *
 * @property int $userprofile_id
 * @property string $dob
 * @property string $address
 * @property string $country
 * @property string $state
 * @property string $city
 * @property int $user_id
 */
class Userprofile extends \yii\db\ActiveRecord
{
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
       return '{{%userprofile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['address', 'country', 'state', 'city','dob'], 'required'],
//            [['user_id'], 'integer'],
//           // [['email'], 'email'],
//            [['dob'], 'string', 'max' => 164],
//            [['address'], 'string', 'max' => 464],
//            [['country', 'state', 'city'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userprofile_id' => 'Userprofile ID',
            'dob' => 'Dob',
            'address' => 'Address',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'user_id' => 'User ID',
        ];
    }
    
     public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    
     
    
 
}
