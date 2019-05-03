<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbComandas */

$this->title = Yii::t('app', 'Modificar Comandas: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lista de Comandas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modificar');
?>
<div class="tb-comandas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update-form', [
        'model' => $model,
        'clientes'=>$clientes,
        'clasicos' => $clasicos,
        'alinados' => $alinados,
        'especiales' => $especiales,
        'autor' => $autor,
        'metodos' => $metodos,
        'frappuchin' => $frappuchin,
        'frullatos' => $frullatos,
        'sandwishes' => $sandwishes,
        'tequenos' => $tequenos,
        'panquecas' => $panquecas,
        'waffles' => $waffles,
        'adicionale' => $adicionale,
        'croissants' => $croissants,
        'postres' => $postres,
        'productosUpdate' => $productosUpdate,
    ]) ?>

</div>
