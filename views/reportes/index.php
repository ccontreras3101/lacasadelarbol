<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;


echo 'Testing for ' . Html::tag('span', 'tooltip', [
    'title'=>'This is a test tooltip',
    'data-toggle'=>'tooltip',
    'style'=>'text-decoration: underline; cursor:pointer;'
]);


?>