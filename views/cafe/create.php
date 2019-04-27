<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbCafe */

$this->title = Yii::t('app', 'Create Tb Cafe');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tb Caves'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-cafe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
