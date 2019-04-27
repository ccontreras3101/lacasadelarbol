<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TbComandas */

$this->title = "Mesa N°: ".$model->id_mesa;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lista de Comandas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-comandas-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <section class="productos table-striped table-bordered">
            <div class="row row-view">
                <div class="flex">
                    <div class="col-md-2 col-sm-2 view-responsive">
                        <h3>Producto</h3>
                           <?php  
                                $each = explode('/', $pedido);
                                foreach ($each as $key => $value) {
                                      echo '<div class=under_line>'. $value.'</div>';
                                  }
                           ?>
                    </div>
                    <div class="col-md-2 col-sm-2 view-responsive">
                        <h3> Ctd</h3>

                         <?php
                            $each_ctd = explode(',', $model->ctd);
                                foreach ($each_ctd as $key => $value_ctd) {
                                      echo '<div class=under_line>'. $value_ctd.'</div>';
                                  }
                          ?>
                    </div>
                </div>
                <div class=" col-sm-2 col-md-2">
                    <h3>Usuario</h3>
                    <?php echo $usuario->nombres.", ".$usuario->apellidos ?>
                </div>
                <div class=" col-sm-2 col-md-2">
                    <h3>Mesa</h3>
                    <?php echo $model->id_mesa ?>
                </div>
                <div class=" col-sm-2 col-md-2">
                    <h3>Status</h3>
                    <a href="#" class="a_status">
                    <?php 
                        if ($model->status == 0) {
                            echo "En proceso";
                            $this->registerJs('
                                $(".a_status").css({
                                       "background" : "red",
                                       "color" : "#fff",
                                       "display": "block",
                                        "padding": "5px",
                                        "border-radius": "5px",
                                        "margin-bottom": "5px"
                                    });
                                ');
                        } else{
                            echo "Entregado";
                                $this->registerJs('
                                   $(".a_status").css({
                                           "background" : "green",
                                           "color" : "#fff",
                                           "display": "inline-flex",
                                            "padding": "5px",
                                            "border-radius": "5px",
                                            "margin-bottom": "5px"
                                        });
                                    ');
                        }
                    
                    ?>
                    </a>
                </div>
                <div class=" col-sm-2 col-md-2">
                    <h3>Opciones</h3>
                    <?= Html::a(Yii::t('app', ''), ['index'], 
                                                        [
                                                            'class' => 'glyphicon glyphicon-home',
                                                            'title' => 'Lista de Comandas'
                                                        ]) 
                    ?>
                    <?php if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 3) {?>
                        <?= Html::a(Yii::t('app', ''), ['update', 'id' => $model->id, 
                                                              'id_cliente' => $model->id_cliente,
                                                              'id_productos' => $model->id_productos, 
                                                            ], 
                                                            [
                                                                'class' => 'glyphicon glyphicon-pencil',
                                                                'title' => 'Editar'
                                                            ]) 
                        ?>

                    <?php } ?>
                </div>
            </div>
        </section>
    </div>   
</div>
