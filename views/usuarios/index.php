<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TbUsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Lista de Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Usuari@'), ['create'], ['class' => 'btn btn_custom']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute'=>'', 
            'value'=>function($model){
                    if($model->id_rol == 1){
                        return 'Administrador';
                    }
                    if($model->id_rol == 2){
                        return 'Caja';
                    }
                    if($model->id_rol == 3){
                        return 'Mesas';
                    }
                    if($model->id_rol == 4){
                        return 'Café';
                    }
                    if($model->id_rol == 5){
                        return 'Cocina';
                    }
                },
            'label'=>'Rol',
            ],
            //'username',
            //'password',
            'nombres',
            'apellidos',
            'cedula',
            //'direccion',
            //'telf1',
            //'telf2',
            //'email:email',
            //'facebook',
            //'twitter',
            //'instagram',
            //'f_ingreso',
            //'f_egreso',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
