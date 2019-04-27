<?php

namespace app\models;

use Yii;

/**
    * This is the model class for table "{{%tb_comandas}}".
    *
    * @property int $id
    * @property int $id_productos
    * @property int $ctd
    * @property int $id_usuario
    * @property int $id_mesa
    * @property int $id_cliente
    * @property int $status
    * @property status_cafe
    * @property status_cocina
    * @property obs_expressos
    * @property obs_lattes
    * @property obs_bfrias
    * @property obs_energy
    * @property obs_shake
    * @property obs_fruits
    * @property obs_paninis
    * @property obs_salads
    * @property obs_hotcakes
    * @property obs_cakes
    * @property obs_deserts
    * @property h_pedido
    * @property h_entrega
    
    *
    * @property TbCafe $tbCafe
    * @property TbCocina $tbCocina
    * @property TbUsuarios $usuario
    * @property TbClientes $cliente
    * @property TbFacturacion $tbFacturacion
    * @property TbProductos $tbProductos

 */
class TbComandas extends \yii\db\ActiveRecord
{
    public $cedula_cliente;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tb_comandas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_productos', 'ctd', 'id_usuario', 'id_mesa',/* 'id_cliente',*/ 'status', 'cedula_cliente'], 'required'],
            [['id_productos', 'ctd', 'id_usuario', 'id_mesa'], 'integer'],
            [['id_productos','ctd','id_usuario','id_mesa','id_cliente','status','status_cafe','status_cocina','obs_expressos','obs_lattes','obs_bfrias','obs_energy','obs_shake','obs_fruits','obs_paninis','obs_salads','obs_hotcakes','obs_cakes','obs_deserts' ,'h_pedido','h_entrega',], 'safe'],
            [['status'], 'string', 'max' => 1],
            [['id_productos'], 'unique'],
            [['id_usuario'], 'unique'],
            [['id_cliente'], 'unique'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => TbUsuarios::className(), 'targetAttribute' => ['id_usuario' => 'id']],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => TbClientes::className(), 'targetAttribute' => ['id_cliente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_productos' => 'Id Productos',
            'ctd' => 'Ctd',
            'cedula_cliente' => 'Cedula del Cliente',
            'id_usuario' => 'Id Usuario',
            'id_mesa' => '# de Mesa',
            'id_cliente' => 'Cedula del Cliente',
            'status' => 'Status',
            'status_cafe' => 'Observaciones',
            'status_cocina' => 'Observaciones',
            'obs_expressos'=> 'Observaciones',
            'obs_lattes'=> 'Observaciones',
            'obs_bfrias'=> 'Observaciones',
            'obs_energy'=> 'Observaciones',
            'obs_shake'=> 'Observaciones',
            'obs_fruits'=> 'Observaciones',
            'obs_paninis'=> 'Observaciones',
            'obs_salads'=> 'Observaciones',
            'obs_hotcakes'=> 'Observaciones',
            'obs_cakes'=> 'Observaciones',
            'obs_deserts'=> 'Observaciones',
            'h_pedido' => 'Observaciones',
            'h_entrega' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbCafe()
    {
        return $this->hasOne(TbCafe::className(), ['id_comanda' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbCocina()
    {
        return $this->hasOne(TbCocina::className(), ['id_comanda' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(TbUsuarios::className(), ['id' => 'id_usuario']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario_full()
    {
        return $this->usuario->nombres.",". $this->usuario->apellidos;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function getClientes()
    {
        return TbClientes::find()->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbFacturacion()
    {
        return $this->hasOne(TbFacturacion::className(), ['id_comanda' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbProductos()
    {
        return $this->hasOne(TbProductos::className(), ['id' => 'id_productos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductosName()
    {
        return TbProductos::find()->all(); 
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductosUpdate()
    {
        return TbComandas::find()->where(['id' => $_GET['id']])->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductosid()
    {
        return $this->hasOne(TbProductos::className(), ['id' => 'id_productos']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->productosid;
    }
    /**
    * @return \yii\db\ActiveQuery
    */

        public static function getExpressos()
        {
            return TbProductos::find()->where(['grupo' => 'expresso'])->All();
        }
        public static function getLattes()
        {
            return TbProductos::find()->where(['grupo' => 'lattes'])->All();
        }
        public static function getBfrias()
        {
            return TbProductos::find()->where(['grupo' => 'b_frias'])->All();
        }
        public static function getEnergy()
        {
            return TbProductos::find()->where(['grupo' => 'energizant'])->All();
        }
        public static function getShake()
        {
            return TbProductos::find()->where(['grupo' => 'merengadas'])->All();
        }
        public static function getFruits()
        {
            return TbProductos::find()->where(['grupo' => 'm_frutas'])->All();
        }
        public static function getPaninis()
        {
            return TbProductos::find()->where(['grupo' => 'panini'])->All();
        }
        public static function getSalads()
        {
            return TbProductos::find()->where(['grupo' => 'ensaladas'])->All();
        }
        public static function getHotcakes()
        {
            return TbProductos::find()->where(['grupo' => 'p_caliente'])->All();
        }
        public static function getCakes()
        {
            return TbProductos::find()->where(['grupo' => 'tortas'])->All();
        }
        public static function getDeserts()
        {
            return TbProductos::find()->where(['grupo' => 'postres'])->All();
        }

    



}












