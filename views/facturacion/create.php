<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbFacturacion */

$this->title = Yii::t('app', 'Create Tb Facturacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tb Facturacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-facturacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
