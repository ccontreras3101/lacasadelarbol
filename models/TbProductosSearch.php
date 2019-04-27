<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbProductos;

/**
 * TbProductosSearch represents the model behind the search form of `app\models\TbProductos`.
 */
class TbProductosSearch extends TbProductos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_iva', 'base_imponible', 'iva', 'total'], 'integer'],
            [['producto'], 'safe'],
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
        $query = TbProductos::find();

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
            'id_iva' => $this->id_iva,
            'base_imponible' => $this->base_imponible,
            'iva' => $this->iva,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'producto', $this->producto]);

        return $dataProvider;
    }
}
