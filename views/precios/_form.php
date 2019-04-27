<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbProductos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_iva')->textInput() ?>

    <?= $form->field($model, 'producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'base_imponible')->textInput() ?>

    <?= $form->field($model, 'iva')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
