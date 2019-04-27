<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbCocina */

$this->title = Yii::t('app', 'Create Tb Cocina');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tb Cocinas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-cocina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
