<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbUsuarios */

$this->title = Yii::t('app', 'Modificar datos de Usuarios: {nameAttribute}', [
    'nameAttribute' => $model->nombres.", ". $model->apellidos,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lista de Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombres.", ". $model->apellidos, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modificar');
?>
<div class="tb-usuarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
