<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Iva */

$this->title = Yii::t('app', 'Create Iva');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ivas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iva-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
