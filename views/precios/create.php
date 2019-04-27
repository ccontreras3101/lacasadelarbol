<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbProductos */

$this->title = Yii::t('app', 'Create Tb Productos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tb Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-productos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
