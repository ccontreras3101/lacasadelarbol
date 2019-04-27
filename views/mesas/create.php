<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbMesas */

$this->title = Yii::t('app', 'Create Tb Mesas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tb Mesas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-mesas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
