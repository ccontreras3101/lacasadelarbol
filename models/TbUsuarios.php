<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_usuarios}}".
 *
 * @property int $id
 * @property int $id_rol
 * @property string $username
 * @property string $password
 * @property string $nombres
 * @property string $apellidos
 * @property string $cedula
 * @property string $direccion
 * @property string $telf1
 * @property string $telf2
 * @property string $email
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property string $f_ingreso
 * @property string $f_egreso
 *
 * @property TbComandas $tbComandas
 * @property TbRol $tbRol
 */
class TbUsuarios extends \yii\db\ActiveRecord
{
    public $roles;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tb_usuarios}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rol', 'username', 'password', 'nombres', 'apellidos', 'cedula', 'direccion', 'telf1', 'f_ingreso'], 'required'],
            [[ 'telf2', 'email', 'facebook', 'twitter', 'instagram', 'f_egreso'], 'safe'],
            [['id_rol'], 'integer'],
            [['f_ingreso', 'f_egreso'], 'safe'],
            [['username', 'telf1', 'telf2'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 12],
            [['nombres', 'apellidos', 'email', 'facebook', 'twitter', 'instagram'], 'string', 'max' => 50],
            [['cedula', 'roles'], 'string', 'max' => 10],
            [['direccion'], 'string', 'max' => 125],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_rol' => 'Id Rol',
            'username' => 'Usuario',
            'password' => 'Password',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'cedula' => 'Cedula',
            'direccion' => 'Direccion',
            'telf1' => 'Telf1',
            'telf2' => 'Telf2',
            'email' => 'Email',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'f_ingreso' => 'F Ingreso',
            'f_egreso' => 'F Egreso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbComandas()
    {
        return $this->hasOne(TbComandas::className(), ['id_usuario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbRol()
    {
        return $this->hasOne(TbRol::className(), ['id' => 'id_rol']);
    }

}
