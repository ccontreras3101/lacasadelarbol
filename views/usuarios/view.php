<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TbUsuarios */

$this->title = $model->nombres.", ".$model->apellidos;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lista de Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', ''), ['index'], 
                                            [
                                                'class' => 'glyphicon glyphicon-home',
                                                'title' => 'Lista de Usuarios'
                                            ]) 
        ?>
        <?= Html::a(Yii::t('app', ''), ['update', 'id' => $model->id], 
                                            [
                                                'class' => 'glyphicon glyphicon-pencil',
                                                'title' => 'Editar'
                                            ]) 
        ?>
       <?= Html::a(Yii::t('app', ''), ['delete', 'id' => $model->id], 
                                            [
                                                'class' => 'glyphicon glyphicon-trash',
                                                'title' => 'Borrar',
                                                'data' => [
                                                    'confirm' => Yii::t('app', 'Está seguro de eliminar ést@ Usuari@?'),
                                                    'method' => 'post',
                                                ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
                        return 'Mesa';
                    }
                    if($model->id_rol == 4){
                        return 'Cáfe';
                    }
                    if($model->id_rol == 5){
                        return 'Cocina';
                    }
                },
            'label'=>'Area',
            ],
            'username',
            'nombres',
            'apellidos',
            'cedula',
            'direccion',
            'telf1',
            'telf2',
            'email:email',
            'facebook',
            'twitter',
            'instagram',
            'f_ingreso',
            'f_egreso',
        ],
    ]) ?>

</div>
