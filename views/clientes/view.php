<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TbCLientes */

$this->title = $model->nombres.", ".$model->apellidos;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lista de Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-clientes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', ''), ['index'], [
                                                'class' => 'glyphicon glyphicon-home',
                                                'title' => 'Lista de Clientes']) 
        ?>
        <?= Html::a(Yii::t('app', ''), ['update', 'id' => $model->id], [
                                                'class' => 'glyphicon glyphicon-pencil',
                                                'title' => 'Editar']) 
        ?>
        <?= Html::a(Yii::t('app', ''), ['delete', 'id' => $model->id], [
            'class' => 'glyphicon glyphicon-trash',
                                                'title' => 'Borrar',
                                                'data' => [
                                                    'confirm' => Yii::t('app', 'Está seguro de eliminar éste cliente'),
                                                    'method' => 'post',
                                                ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombres',
            'apellidos',
            'cedula',
            'direccion',
            'telf1',
            'facebook',
            'twitter',
            'instagram',
            'email:email',
        ],
    ]) ?>

</div>
