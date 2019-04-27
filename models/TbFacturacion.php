<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_facturacion}}".
 *
 * @property int $id
 * @property int $id_comanda
 * @property string $fecha
 * @property int $sub_total
 * @property int $iva
 * @property int $total
 *
 * @property TbComandas $comanda
 */
class TbFacturacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tb_facturacion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comanda', 'fecha', 'sub_total', 'iva', 'total'], 'required'],
            [['id_comanda', 'sub_total', 'iva', 'total'], 'integer'],
            [['fecha'], 'safe'],
            [['id_comanda'], 'unique'],
            [['id_comanda'], 'exist', 'skipOnError' => true, 'targetClass' => TbComandas::className(), 'targetAttribute' => ['id_comanda' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_comanda' => 'Id Comanda',
            'fecha' => 'Fecha',
            'sub_total' => 'Sub Total',
            'iva' => 'Iva',
            'total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComanda()
    {
        return $this->hasOne(TbComandas::className(), ['id' => 'id_comanda']);
    }
}
