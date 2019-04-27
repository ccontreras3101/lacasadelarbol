<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbUsuarios */

$this->title = Yii::t('app', 'Crear Usuari@');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lista de Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-usuarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
