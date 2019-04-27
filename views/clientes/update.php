<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbCLientes */

$this->title = Yii::t('app', 'Modificar datos de Cliente: {nameAttribute}', [
    'nameAttribute' => $model->nombres.", ". $model->apellidos,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lista de Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombres.", ". $model->apellidos, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modificar');
?>
<div class="tb-clientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
