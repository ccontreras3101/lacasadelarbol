
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\TbPrecios;
use app\models\Tbusuarios;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TbComandasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comandas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-comandas-index">

    <h1><?= Html::encode($this->title) ?>
     <?php 
        if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 1){
        echo "Administración"; } // Admin 
        if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 2){
        echo "Caja"; } // Caja
        if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 3){
        echo "Mesas"; } // Mesas
        if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 4){
        echo "Café"; } // Cafe
        if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 5){
        echo "Cocina"; } // Cocina
     ?>
    </h1>

    <?php if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 3) { ?>
        <p>
            <?= Html::a(Yii::t('app', 'Nueva Comanda'), ['create'], ['class' => ' btn btn_custom']) ?>
        </p>
    <?php } ?>
    <!-- -->
        <div id="table" name="table" class="table table-striped table-bordered">
            
                <div id="id"  name="id" class="grid col-xs-1">
                            <h4>Id</h4>
                           
                </div>
            
        </div>
    <!-- -->
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
