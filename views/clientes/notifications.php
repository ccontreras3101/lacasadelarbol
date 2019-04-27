<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\TbClientes;
use app\models\TbUsuarios;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TbClientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pedidos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-clientes-notifications">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="table table-striped table-bordered" id="table" name="table">
    <div class="row header">
        <div class="col-sm-1 col-md-1 center">
            <h4>Mesa</h4>
        </div>
        <div class="col-sm-1 col-md-1 center">
            <h4>Estatus</h4>
        </div>
        <div class="col-sm-5 col-md-5 center">
            <h4>Cliente</h4>
        </div>
        <div class="col-sm-5 col-md-5 center">
            <h4>Meser@</h4>
        </div>
    </div>
    <div class="row"><!-- / row header-->  
        <?php foreach ($comandas as $key => $comanda) { ?>
         <div class="col-sm-1 col-md-1 center">
            <h4><?php echo $comanda->id_mesa ?></h4>
        </div>
        <div class="col-sm-1 col-md-1 center">
            <div>
                <h4>
                    <?php  
                        if($comanda->status_cafe == 1){ 

                        ?>
                            <a  class="btn btn-danger img_no_responsive"  >
                                <?php echo Html::img(Yii::$app->Request->baseUrl.'/web/images/cup.png', ['class' => 'img_index_listo']); ?>
                            </a>
                       <?php }
                        if($comanda->status_cafe == 2){ 
        
                        ?>
                            <a  class="btn btn-success img_no_responsive">
                                <?php echo Html::img(Yii::$app->Request->baseUrl.'/web/images/cup.png', ['class' => 'img_index_listo']); ?>
                            </a>
                                                                                      
                        <?php } ?> <!-- /if -->
                </h4>
            </div>
            <div>
                <h4>
                    <?php 
                    // $comanda->status_cocina 
                    if($comanda->status_cocina == 1){ ?>
                            <a  class="btn btn-danger img_no_responsive"  >
                                <?php echo Html::img(Yii::$app->Request->baseUrl.'/web/images/kitchen.png', ['class' => 'img_index_listo']); ?>
                            </a>
                       <?php }
                        if($comanda->status_cocina == 2 ){ 
                        ?>
                            <a  class="btn btn-success img_no_responsive">
                                <?php echo Html::img(Yii::$app->Request->baseUrl.'/web/images/kitchen.png', ['class' => 'img_index_listo']); ?>
                            </a>
                                                                                      
                        <?php } ?> <!-- /if -->               
                </h4>
            </div>
        </div>
        <div class="col-sm-5 col-md-5 center">
            <h4 class="clienteName">
                <?php
                    $cliente = TbClientes::find($comanda->id_cliente)->One(); 
                    if($comanda->status_cafe == 2 ||  $comanda->status_cocina == 2){ ?>
                        <a  class="btn btn-success img_no_responsive">
                        <?php echo($cliente->nombres.", ".$cliente->apellidos); ?>
                        </a>
                    <?php 
                    }else{
                         echo($cliente->nombres);
                    } // /if 
                    ?>
            </h4>
        </div>
        <div class="col-sm-5 col-md-5 center">
            <h4>
                <?php
                    $usuario = TbUsuarios::find()->where(['id'=>$comanda->id_usuario])->One(); 
                    echo $usuario->nombres; 
                ?>
            </h4>
        </div>
        <?php } ?> <!-- end foreach-->
    </div>
    </div>    
</div>
<?php
    $this->registerJs('
        setInterval(function() {
              $("#table").load(" #table");
              console.log("ok");
        }, 1000);
        
        $(".navbar-inverse").css("display", "none");
    ');
?>