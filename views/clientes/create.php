<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbCLientes */

$this->title = Yii::t('app', 'Crear Clientes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lista de Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-clientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
