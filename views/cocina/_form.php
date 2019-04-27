<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbCocina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-cocina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_comanda')->textInput() ?>

    <?= $form->field($model, 'h_entrada')->textInput() ?>

    <?= $form->field($model, 'h_salida')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
