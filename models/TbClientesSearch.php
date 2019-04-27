<?php

namespace app\models;


use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbClientes;

class TbClientesSearch extends TbClientes
{
     /**
      * @inheritdoc
      */
     public function rules()
     {
         return [
             [['id'], 'integer'],
             [['nombres', 'apellidos', 'cedula', 'direccion', 'telf1', 'facebook', 'twitter', 'instagram', 'email'], 'safe'],
         ];
     }

     /**
      * @inheritdoc
      */
     public function scenarios()
     {
        //  bypass scenarios() implementation in the parent class
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
         $query = TbCLientes::find();

        //  add conditions that should always apply here

         $dataProvider = new ActiveDataProvider([
             'query' => $query,
         ]);

         $this->load($params);

         if (!$this->validate()) {
             // uncomment the following line if you do not want to return any records when validation fails
            //  $query->where('0=1');
             return $dataProvider;
         }

        //  grid filtering conditions
         $query->andFilterWhere([
             'id' => $this->id,
         ]);

         $query->andFilterWhere(['like', 'nombres', $this->nombres])
             ->andFilterWhere(['like', 'apellidos', $this->apellidos])
             ->andFilterWhere(['like', 'cedula', $this->cedula])
             ->andFilterWhere(['like', 'direccion', $this->direccion])
             ->andFilterWhere(['like', 'telf1', $this->telf1])
             ->andFilterWhere(['like', 'facebook', $this->facebook])
             ->andFilterWhere(['like', 'twitter', $this->twitter])
             ->andFilterWhere(['like', 'instagram', $this->instagram])
             ->andFilterWhere(['like', 'email', $this->email]);

         return $dataProvider;
     }
}
?>