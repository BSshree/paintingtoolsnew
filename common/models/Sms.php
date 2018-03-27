<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sms".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 */
class Sms extends \yii\db\ActiveRecord
{
    public $name1;
    public $email1;
    public $address;
    public $type_service;
    public $issued_by;
    public $issued_date;
    public $otp;
    public $newphone;
    public $phone1;
    public $verifyotp;
    public $payment_mode;
    public $amount;
    public $cheque_no;
    public $credit_no;
    public $mess;
    public $plan;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','name1','phone','phone1','email1', 'email','address','amount','type_service','issued_by','issued_date','payment_mode'],'required'],
            [['name'], 'string', 'max' => 70],
            
            ['credit_no', 'required',   'whenClient' => "function (attribute, value) {
                return $('#sms-payment_mode').val() == '3';
            }"],
            ['cheque_no', 'required',   'whenClient' => "function (attribute, value) {                
                return $('#sms-payment_mode').val() == '2';
            }"],
            
            
//              ['cheque_no','required','when'=>function($model) {
//                return $model->payment_mode == '2';//Cheque
//            }],
//             ['credit_no','required','when'=>function($model) {
//                return $model->payment_mode == '3';
//            }],
                   
//            ['credit_no', 'required', 'when' => function ($model) {
//                return $model->payment_mode == '3';
//            }, 'whenClient' => "function (attribute, value) {
//                return $('#Sms-credit').val() == '3';
//            }"],
//             [['credit_no'], 'required', 'on' => 'pdfpage', 'when' => function ($model) {
//                    return ($model->payment_mode == '3');
//                }, 'whenClient' => "function (attribute, value) {
//                return ($('#sms-payment_mode').val() =='3');
//            }"],
//              [['cheque_no'], 'required', 'on' => 'pdfpage', 'when' => function ($model) {
//                  return ($model->payment_mode == '2');
//                }, 'whenClient' => "function (attribute, value) {
//                return ($('#sms-payment_mode').val() =='2');
//            }"],
                    
//            [['email'], 'string', 'max' => 150],
            ['email1','email'],
            ['email','email'],
            [['phone'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 170],
            [['amount'], 'number'],
            [['credit_no'], 'string', 'max' => 170],
            [['cheque_no'], 'string', 'max' => 170],    
            [['type_service'], 'string', 'max' => 170],
            [['receipt_data'], 'string', 'max' => 970],
            [['issued_by'], 'string', 'max' => 170],
            [['issued_date'], 'string', 'max' => 170],
            [['payment_mode'], 'safe'],
//            [['order_status_id'], 'checkOrdreTrack'],
          //  [['mess'], 'required'],
           // [['name'], 'unique'],
        ];
    }

//    public function scenarios() {
//        $scenarios = parent::scenarios();
//        $scenarios['bookotp'] = ['mess','name','email','type_service'];//Scenario Values Only Accepted
//	return $scenarios;
//    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name1' => 'Name',
            'name' => 'Name',
            'email1' => 'Email',
            'email' => 'Email',
            'phone1' => 'Phone',
            'phone' => 'Phone',
            'issued_date' => 'Issued on',
            'type_service' => 'Service type',
            'credit_no' => 'Credit Card No',
            'payment_mode' => 'Payment Mode',
        ];
    }
}
