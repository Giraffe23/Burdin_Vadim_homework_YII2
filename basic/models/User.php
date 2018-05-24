<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $surname
 * @property string $password_hash
 * @property string $access_token
 * @property string $auth_key
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Access[] $accesses
 * @property Note[] $notes
 * 
 * @mixin TimestampBehavior
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    const RELATION_NOTES = 'notes';
    const RELATION_ACCESSES = 'accesses';
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $password;
    public $password_repeat;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
//-----------------------------Задание 1-2-----------------------------------------
    public function scenarios() 
    {
        return [
            self::SCENARIO_DEFAULT => ['username', 'name', 'surname', 'password', 'password_repeat', 'access_token', 'auth_key'],
            self::SCENARIO_CREATE => ['username', 'name', 'surname', 'password', 'password_repeat'],
            self::SCENARIO_UPDATE => ['username', 'name', 'surname'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['username', 'name', 'surname', 'password', 'password_repeat', 'access_token', 'auth_key'], 'string', 'max' => 255],
            ['password', 'compare', 'compareAttribute' => 'password_repeat'],
            [['password', 'password_repeat'], 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

    public function behaviors() 
    {
        return [
            TimestampBehavior:: class
        ];
    }
//---------------------------------Задание 4-------------------------------------

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        } 
        if($this->password){
            $this->password_hash = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
        }
        if ($this->isNewRecord) {
            $this->auth_key = \Yii::$app->getSecurity()->generateRandomString();
        }
        return true;
    }

//-------------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'surname' => 'Surname',
            'password' => 'Password',
            'password_repeat' => 'Confirm Password',
            'access_token' => 'Access Token',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesses()
    {
        return $this->hasMany(Access::class, ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::class, ['creator_id' => 'id']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessedNotes()
    {
        return $this->hasMany(Note::class, ['id' => 'note_id'])
            ->via(self::RELATION_ACCESSES);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\UserQuery(get_called_class());
    }

//-----------------------------Задание 5-----------------------------------------

     /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

//-------------------------------Задание 3---------------------------------------

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
