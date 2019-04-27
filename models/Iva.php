<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%iva}}".
 *
 * @property int $id
 * @property int $iva
 *
 * @property TbPrecios $id0
 */
class Iva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%iva}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'iva'], 'required'],
            [['id', 'iva'], 'integer'],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => TbPrecios::className(), 'targetAttribute' => ['id' => 'id_iva']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iva' => 'Iva',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(TbPrecios::className(), ['id_iva' => 'id']);
    }
}
