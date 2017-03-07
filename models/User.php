<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $ID
 * @property string $Display_Name
 * @property string $User_Name
 * @property string $Password
 * @property string $Contact
 * @property integer $Recommend_User
 * @property integer $Status
 * @property string $Create_Date
 * @property integer $Created_By
 * @property string $Update_Date
 * @property integer $Updated_By
 *
 * @property Employee[] $employees
 * @property Lookups $status
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;
    public $accessToken;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Display_Name', 'User_Name', 'Password', 'Contact', 'Recommend_User'], 'required'],
            [['Recommend_User', 'Status', 'Created_By', 'Updated_By'], 'integer'],
            [['Create_Date', 'Update_Date'], 'safe'],
            [['Display_Name', 'User_Name', 'Password'], 'string', 'max' => 50],
            [['Contact'], 'string', 'max' => 100],
            [['Status'], 'exist', 'skipOnError' => true, 'targetClass' => Lookups::className(), 'targetAttribute' => ['Status' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Display_Name' => 'Display  Name',
            'User_Name' => 'User  Name',
            'Password' => 'Password',
            'Contact' => 'Contact',
            'Recommend_User' => 'Recommend  User',
            'Status' => 'Status',
            'Create_Date' => 'Create  Date',
            'Created_By' => 'Created  By',
            'Update_Date' => 'Update  Date',
            'Updated_By' => 'Updated  By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['User_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Lookups::className(), ['ID' => 'Status']);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken'=> $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = User::find()
                ->where(['User_Name'=>$username,'status'=>'1'])
                ->asArray()
                ->one();
        if($user)
        {
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->Password === $password;
    }
}
