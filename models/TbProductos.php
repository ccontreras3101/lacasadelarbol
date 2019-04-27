<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_productos}}".
 *
 * @property int $id
 * @property int $id_iva
 * @property string $producto
 * @property int $base_imponible
 * @property int $iva
 * @property int $total
 * @property str $area
 *
 * @property Iva $iva0
 * @property TbComandas $id0
 */
class TbProductos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tb_productos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_iva', 'producto', 'base_imponible', 'iva', 'total'], 'required'],
            [['id_iva', 'base_imponible', 'iva', 'total'], 'integer'],
            [['producto', 'area'], 'string', 'max' => 50],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => TbComandas::className(), 'targetAttribute' => ['id' => 'id_productos']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_iva' => 'Id Iva',
            'producto' => 'Producto',
            'base_imponible' => 'Base Imponible',
            'iva' => 'Iva',
            'total' => 'Total',
            'area' => 'Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIva0()
    {
        return $this->hasOne(Iva::className(), ['id' => 'id_iva']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(TbComandas::className(), ['id_productos' => 'id']);
    }
}
