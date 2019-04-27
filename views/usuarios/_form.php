<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TbRol;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\TbUsuarios */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="tb-usuarios-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id_rol')->dropDownList(ArrayHelper::map(TbRol::find()->all(),'id', 'descripcion'),['prompt'=>'seleccione el rol']) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telf1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telf2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'f_ingreso')->widget(\yii\jui\DatePicker::class, [
        'options'=>[
            'class'=> 'form-control',
            ],
        'dateFormat' => 'yyyy-MM-dd',
        ]) 
    ?>

    <?= $form->field($model, 'f_egreso')->widget(\yii\jui\DatePicker::class, [
        'options'=>[
            'class'=> 'form-control',
            ],
        'dateFormat' => 'yyyy-MM-dd',
        ]) 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Crear'), ['class' => 'btn btn_custom']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
