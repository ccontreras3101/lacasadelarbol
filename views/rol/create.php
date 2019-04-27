<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbRol */

$this->title = Yii::t('app', 'Create Tb Rol');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tb Rols'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-rol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
