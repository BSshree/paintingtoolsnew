<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public $oldpass;
    public $newpass;
    public $repeatnewpass;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['newpass', 'repeatnewpass', 'oldpass'], 'required', 'on' => 'changepassword'],
            ['oldpass', 'validateoldPassword', 'on' => 'changepassword'],
            [['newpass', 'repeatnewpass'], 'string', 'min' => 3, 'on' => 'changepassword', 'message' => 'You must enter minimum 3 characters'],
            //   ['repeatnewpass', 'compare', 'compareAttribute' => 'newpass', 'on' => 'changepassword'],
            [['repeatnewpass'], 'compare', 'compareAttribute' => 'newpass', 'message' => 'Password do not match', 'on' => 'changepassword'],
        
        ];
    }

    
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['changepassword'] = ['newpass','oldpass','repeatnewpass'];
	return $scenarios;
    }
    
     public function findPasswords($attribute, $params) {
        $user = User::findOne(Yii::$app->user->getId());
        $password = $user->password_hash;
        if (!Yii::$app->security->validatePassword($this->oldpass, $password))
            $this->addError($attribute, 'Old password is incorrect');
    }
    
     public function attributeLabels() {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password',
            'oldpass' => 'Old Password',
            'newpass' => 'New Password',
            'repeatnewpass' => 'Repeat New Password',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    
   
    
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
     public function getUsername()
    {
        return $this->username;
    }
    
    public function getPassword()
    {
        return $this->password_hash;
    }
    /**
     * @inheritdoc
     */
    
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash); 
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    public function verifyPassword($password) {

        $dbpassword = static ::findOne(['username' => yii::$app->user->identity->username, 'status' => self::STATUS_ACTIVE])->password_hash;
        return yii::$app->security->validatepassword($password, $dbpassword);
    }
    
    public function validateoldPassword($attribute, $params) {

        if (!$this->verifyPassword($this->oldpass)) {
            $this->addError($attribute, 'Incorrect old password.');
        }
    }
    
    public function getUserprofile()
    {
        return $this->hasOne(Userprofile::className(), ['user_id' => 'id']);
    }
}
