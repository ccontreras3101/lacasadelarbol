<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbComandas;

/**
 * TbComandasSearch represents the model behind the search form of `app\models\TbComandas`.
 */
class TbComandasSearch extends TbComandas
{
    public $usuario;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_productos', 'ctd', 'id_usuario', 'id_mesa', 'id_cliente'], 'integer'],
            [['status','usuario','productos'], 'safe'],
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
        $query = TbComandas::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);

        $dataProvider->setSort([
            'attributes' => [
                'usuario' => [
                'asc' => ['nombres' => SORT_ASC, 'apellidos' => SORT_ASC],
                'desc' => ['nombres' => SORT_DESC, 'apellidos' => SORT_DESC],
                    'label' => 'Usuarios',
                    'default' => SORT_ASC
                ]
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
                return $dataProvider;
            }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_productos' => $this->id_productos,
            'ctd' => $this->ctd,
            'id_usuario' => $this->id_usuario,
            'id_mesa' => $this->id_mesa,
            'id_cliente' => $this->id_cliente,
             
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);
        $query->andFilterWhere(['like', 'productos.producto', $this->productos]);
        //$query->joinWith(['usuario'])->one();

        return $dataProvider;
    }
}
