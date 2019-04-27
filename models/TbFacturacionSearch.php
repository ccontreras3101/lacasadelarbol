<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbFacturacion;

/**
 * TbFacturacionSearch represents the model behind the search form of `app\models\TbFacturacion`.
 */
class TbFacturacionSearch extends TbFacturacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_comanda', 'sub_total', 'iva', 'total'], 'integer'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TbFacturacion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_comanda' => $this->id_comanda,
            'fecha' => $this->fecha,
            'sub_total' => $this->sub_total,
            'iva' => $this->iva,
            'total' => $this->total,
        ]);

        return $dataProvider;
    }
}
