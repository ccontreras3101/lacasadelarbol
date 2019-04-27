<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_rol}}".
 *
 * @property int $id
 * @property string $descripcion
 *
 * @property TbUsuarios $id0
 */
class TbRol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tb_rol}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 25],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => TbUsuarios::className(), 'targetAttribute' => ['id' => 'id_rol']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(TbUsuarios::className(), ['id_rol' => 'id']);
    }
}
