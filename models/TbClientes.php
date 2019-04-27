<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_clientes}}".
 *
 * @property int $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $cedula
 * @property string $direccion
 * @property string $telf1
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property string $email
 *
 * @property TbComandas $tbComandas
 */
class TbClientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tb_clientes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos', 'cedula', 'direccion', 'telf1'], 'required'],
            [['facebook', 'twitter', 'instagram', 'email'], 'safe'],
            [['nombres', 'apellidos', 'direccion', 'facebook', 'twitter', 'instagram', 'email'], 'string', 'max' => 50],
            [['cedula'], 'string', 'max' => 10],
            [['telf1'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'cedula' => 'Cedula',
            'direccion' => 'Direccion',
            'telf1' => 'Telf1',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'email' => 'Email',
        ];
    }

    
}
