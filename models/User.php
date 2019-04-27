<?php

namespace app\models;
use app\models\TbUsuarios;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $id_rol;
    public $nombres;
    public $apellidos;
    public $cedula;
    public $direccion;
    public $telf1;
    public $telf2;
    public $email;
    public $facebook;
    public $twitter;
    public $instagram;
    public $f_ingreso;
    public $f_egreso;
    

    public static function findIdentity($id)
    {
        $users = TbUsuarios::find()->where(['id'=>$id])->one();

        return isset( $users ) ? new static( $users ) : null;
        
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $users = TbUsuarios::find()->where(['username'=>$username])->all();
        foreach ($users as $user) {

            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    public function getFullname()
    {
        return $this->nombres.",".$this->apellidos;
    }
    public function getRol()
    {
        //return $this->descripcion;
        return $this->hasOne(TbRol::className(), ['id' => 'id_rol']);
    }
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //$passHash = password_hash( $this->password, PASSWORD_BCRYPT);
        //return password_verify( $this->password, $passHash) === $password;
        return $this->password === $password;
        //return $this->password === sha1($password);
    }
}
