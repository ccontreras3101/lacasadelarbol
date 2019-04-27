<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbUsuarios;

/**
 * TbUsuariosSearch represents the model behind the search form of `app\models\TbUsuarios`.
 */
class TbUsuariosSearch extends TbUsuarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_rol'], 'integer'],
            [['username', 'password', 'nombres', 'apellidos', 'cedula', 'direccion', 'telf1', 'telf2', 'email', 'facebook', 'twitter', 'instagram', 'f_ingreso', 'f_egreso'], 'safe'],
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
        $query = TbUsuarios::find();

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
            'id_rol' => $this->id_rol,
            'f_ingreso' => $this->f_ingreso,
            'f_egreso' => $this->f_egreso,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'cedula', $this->cedula])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telf1', $this->telf1])
            ->andFilterWhere(['like', 'telf2', $this->telf2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'twitter', $this->twitter])
            ->andFilterWhere(['like', 'instagram', $this->instagram]);

        return $dataProvider;
    }
}
