<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use app\models\Mesas;
use app\models\TbProductos;
use app\models\TbClientes;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\TbComandas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-comandas-form">    
    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="id_usuario" value="<?php echo Yii::$app->user->identity->id  ?>">
    <input type="hidden" name="id_cliente" value="<?php echo $productosUpdate[0]->id_cliente  ?>">
    <div class="row">
        <div class="col-md-12">
            <label>Cedula Cliente</label>
                <?php
                $this->registerJs('
                    $("#cedula_cliente").val('.$productosUpdate[0]->id_cliente.');
                ');
                    $cedula = ArrayHelper::getColumn($clientes, function ($element) {
                        return $element['cedula'].": ".$element['nombres'].", ".$element['apellidos'];                        
                    });
                    echo AutoComplete::widget([
                        'options' => ['class'=> 'form-control cedula',
                                        'title' => 'Intoduzca el Número de Cédula del Cliente',
                                        'required'=>true
                                    ],
                        'id'=>'cedula_cliente',
                        'name' => 'cedula_cliente',
                        'clientOptions' => [
                            'source' => $cedula,
                        ],
                    ]);
                ?>
                <?php  ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <?= $form->field($model, 'id_mesa')->dropDownList(ArrayHelper::map(Mesas::find()->all(),'id', 'id'),['prompt'=>'Mesa #',
                             'title' => 'Número de mesa',
                            ]
                ) ?>
                <label> Hora</label>
                <input type="text" name="h_pedido" id="h_pedido" value="" class="form-control" />
                <?php
                    $this->registerJs('
                        setInterval(function() {
                                    
                                        momentoActual = new Date(); 
                                        hora = parseInt(momentoActual.getHours()); 
                                        minuto = momentoActual.getMinutes(); 
                                        segundo = momentoActual.getSeconds(); 
                                            horaImprimible = hora + ":" + minuto + ":" + segundo;
                                            $("#h_pedido").val(horaImprimible);
                                }, 1000);');// cierra setInterval
                ?>    
        </div>
    </div>
    <div class="row">
        <!--Expressos-->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Menu</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($clasicos as $key => $clasico) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($clasico->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($clasico->id) ?>" id="ctd<?php echo($clasico->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($clasico->id) ?>" id="area<?php echo($clasico->id) ?>" value="<?php echo($clasico->area) ?>" ></td>
                        
                    <?php 
                        $this->registerJs('
                            var va'.$clasico->id.' = $("#ctd'.$clasico->id.'").val();
                            var x'.$clasico->id.' =  0;
                            var i'.$clasico->id.' = 0;
                            
                            $("#ctd'.$clasico->id.'").change(function(){
                                var x'.$clasico->id.' =  1;
                                return (x'.$clasico->id.');
                            });

                            $("#inc'.$clasico->id.'"  ).click(function(){ 
                                i'.$clasico->id.'++;
                                if(i'.$clasico->id.' >= 0){
                                    $("#ctd'.$clasico->id.'").val(i'.$clasico->id.');
                                }
                                if(x'.$clasico->id.' =  1){
                                    $("#ctd'.$clasico->id.'").val(va'.$clasico->id.' +  i'.$clasico->id.');
                                }

                            });

                            $("#dec'.$clasico->id.'"  ).click(function(){ 
                                i'.$clasico->id.'--;
                                if(i'.$clasico->id.' >= 0){
                                    $("#ctd'.$clasico->id.'").val(i'.$clasico->id.');
                                }
                                
                            });
                        ');
                       } //end foreach clasicos
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_clasicos" class="form-control" value="<?php echo($observaciones[0]['obs_clasicos']) ?>">

                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!--end expressos-->
        <!-- Lattes-->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Aliñados</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($alinados as $key => $alinado) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($alinado->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($alinado->id) ?>" id="ctd<?php echo($alinado->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($alinado->id) ?>" id="area<?php echo($alinado->id) ?>" value="<?php echo($alinado->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$alinado->id.' = 0;
                            $("#inc'.$alinado->id.'"  ).click(function(){ 
                                i'.$alinado->id.'++;
                                if(i'.$alinado->id.' >= 0){
                                    $("#ctd'.$alinado->id.'").val(i'.$alinado->id.');
                                }
                            });
                            $("#dec'.$alinado->id.'"  ).click(function(){ 
                                i'.$alinado->id.'--;
                                if(i'.$alinado->id.' >= 0){
                                    $("#ctd'.$alinado->id.'").val(i'.$alinado->id.');
                                }
                            });
                        ');
                       } //end foreach especiales
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_alinados"  id="obs_alinados" class="form-control" value="<?php echo($observaciones[0]['obs_alinados']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!--end especiales -->
        <!-- Bedidas Frias -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Especiales</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($especiales as $key => $especial) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($especial->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($especial->id) ?>" id="ctd<?php echo($especial->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($especial->id) ?>" id="area<?php echo($especial->id) ?>" value="<?php echo($especial->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$especial->id.' = 0;
                            $("#inc'.$especial->id.'"  ).click(function(){ 
                                i'.$especial->id.'++;
                                if(i'.$especial->id.' >= 0){
                                    $("#ctd'.$especial->id.'").val(i'.$especial->id.');
                                }
                            });
                            $("#dec'.$especial->id.'"  ).click(function(){ 
                                i'.$especial->id.'--;
                                if(i'.$especial->id.' >= 0){
                                    $("#ctd'.$especial->id.'").val(i'.$especial->id.');
                                }
                            });
                        ');
                       } //end foreach aliñados
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_especiales"  id="obs_especiales" class="form-control" value="<?php echo($observaciones[0]['obs_especiales']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- end bebidas Bedidas Frias -->
    </div>
    <div class="row">
        <!-- Energy -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Autor</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($autor as $key => $autor_) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($autor_->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($autor_->id) ?>" id="ctd<?php echo($autor_->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($autor_->id) ?>" id="area<?php echo($autor_->id) ?>" value="<?php echo($autor_->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$autor_->id.' = 0;
                            $("#inc'.$autor_->id.'"  ).click(function(){ 
                                i'.$autor_->id.'++;
                                if(i'.$autor_->id.' >= 0){
                                    $("#ctd'.$autor_->id.'").val(i'.$autor_->id.');
                                }
                            });
                            $("#dec'.$autor_->id.'"  ).click(function(){ 
                                i'.$autor_->id.'--;
                                if(i'.$autor_->id.' >= 0){
                                    $("#ctd'.$autor_->id.'").val(i'.$autor_->id.');
                                }
                            });
                        ');
                       } //end foreach autor
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_autor"  id="obs_autor" class="form-control" value="<?php echo($observaciones[0]['obs_autor']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- End Energy -->
        <!-- Malteadas -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Metodos</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($metodos as $key => $metodo) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($metodo->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($metodo->id) ?>" id="ctd<?php echo($metodo->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($metodo->id) ?>" id="area<?php echo($metodo->id) ?>" value="<?php echo($metodo->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$metodo->id.' = 0;
                            $("#inc'.$metodo->id.'"  ).click(function(){ 
                                i'.$metodo->id.'++;
                                if(i'.$metodo->id.' >= 0){
                                    $("#ctd'.$metodo->id.'").val(i'.$metodo->id.');
                                }
                            });
                            $("#dec'.$metodo->id.'"  ).click(function(){ 
                                i'.$metodo->id.'--;
                                if(i'.$metodo->id.' >= 0){
                                    $("#ctd'.$metodo->id.'").val(i'.$metodo->id.');
                                }
                            });
                        ');
                       } //end foreach metodos
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_metodos"  id="obs_metodos" class="form-control" value="<?php echo($observaciones[0]['obs_metodos']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- end Malteadas-->
        <!--Merengadas de Frutas -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Frappuchinos</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($frappuchin as $key => $frappuchin_) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($frappuchin_->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($frappuchin_->id) ?>" id="ctd<?php echo($frappuchin_->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($frappuchin_->id) ?>" id="area<?php echo($frappuchin_->id) ?>" value="<?php echo($frappuchin_->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$frappuchin_->id.' = 0;
                            $("#inc'.$frappuchin_->id.'"  ).click(function(){ 
                                i'.$frappuchin_->id.'++;
                                if(i'.$frappuchin_->id.' >= 0){
                                    $("#ctd'.$frappuchin_->id.'").val(i'.$frappuchin_->id.');
                                }
                            });
                            $("#dec'.$frappuchin_->id.'"  ).click(function(){ 
                                i'.$frappuchin_->id.'--;
                                if(i'.$frappuchin_->id.' >= 0){
                                    $("#ctd'.$frappuchin_->id.'").val(i'.$frappuchin_->id.');
                                }
                            });
                        ');
                       } //end foreach frappuchinos
                    ?>
                </tr>
                <tr>
                   <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_frappuchinos"  id="obs_frappuchinos" class="form-control" value="<?php echo($observaciones[0]['obs_frappuchinos']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- End Merengadas de Frutas -->
    </div><!-- div class row -->
    <div class="row">
        <!-- Paninis -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Frullatos</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($frullatos as $key => $frullato) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($frullato->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($frullato->id) ?>" id="ctd<?php echo($frullato->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($frullato->id) ?>" id="area<?php echo($frullato->id) ?>" value="<?php echo($frullato->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$frullato->id.' = 0;
                            $("#inc'.$frullato->id.'"  ).click(function(){ 
                                i'.$frullato->id.'++;
                                if(i'.$frullato->id.' >= 0){
                                    $("#ctd'.$frullato->id.'").val(i'.$frullato->id.');
                                }
                            });
                            $("#dec'.$frullato->id.'"  ).click(function(){ 
                                i'.$frullato->id.'--;
                                if(i'.$frullato->id.' >= 0){
                                    $("#ctd'.$frullato->id.'").val(i'.$frullato->id.');
                                }
                            });
                        ');
                       } //end foreach frullatos
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_frullatos"  id="obs_frullatos" class="form-control" value="<?php echo($observaciones[0]['obs_frullatos']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- End Paninis -->
         <!--Ensandwish_as -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Sandwish</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($sandwishes as $key => $sandwish) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($sandwish->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($sandwish->id) ?>" id="ctd<?php echo($sandwish->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($sandwish->id) ?>" id="area<?php echo($sandwish->id) ?>" value="<?php echo($sandwish->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$sandwish->id.' = 0;
                            $("#inc'.$sandwish->id.'"  ).click(function(){ 
                                i'.$sandwish->id.'++;
                                if(i'.$sandwish->id.' >= 0){
                                    $("#ctd'.$sandwish->id.'").val(i'.$sandwish->id.');
                                }
                            });
                            $("#dec'.$sandwish->id.'"  ).click(function(){ 
                                i'.$sandwish->id.'--;
                                if(i'.$sandwish->id.' >= 0){
                                    $("#ctd'.$sandwish->id.'").val(i'.$sandwish->id.');
                                }
                            });
                        ');
                       } //end foreach panquecas
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_sandwish"  id="obs_sandwish" class="form-control" value="<?php echo($observaciones[0]['obs_sandwish']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- End Ensandwish_as -->
        <!-- Panpanquecas -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Tequeños</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($tequenos as $key => $tequeno) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($tequeno->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($tequeno->id) ?>" id="ctd<?php echo($tequeno->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($tequeno->id) ?>" id="area<?php echo($tequeno->id) ?>" value="<?php echo($tequeno->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$tequeno->id.' = 0;
                            $("#inc'.$tequeno->id.'"  ).click(function(){ 
                                i'.$tequeno->id.'++;
                                if(i'.$tequeno->id.' >= 0){
                                    $("#ctd'.$tequeno->id.'").val(i'.$tequeno->id.');
                                }
                            });
                            $("#dec'.$tequeno->id.'"  ).click(function(){ 
                                i'.$tequeno->id.'--;
                                if(i'.$tequeno->id.' >= 0){
                                    $("#ctd'.$tequeno->id.'").val(i'.$tequeno->id.');
                                }
                            });
                        ');
                       } //end foreach sandwish
                    ?>
                </tr>
                <tr>
                   <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_tequenos"  id="obs_tequenos" class="form-control" value="<?php echo($observaciones[0]['obs_tequenos']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- End Panpanquecas -->  
    </div>
    <div class="row">
        <!--Tortas -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Panquecas</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($panquecas as $key => $panqueca) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($panqueca->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($panqueca->id) ?>" id="ctd<?php echo($panqueca->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($panqueca->id) ?>" id="area<?php echo($panqueca->id) ?>" value="<?php echo($panqueca->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$panqueca->id.' = 0;
                            $("#inc'.$panqueca->id.'"  ).click(function(){ 
                                i'.$panqueca->id.'++;
                                if(i'.$panqueca->id.' >= 0){
                                    $("#ctd'.$panqueca->id.'").val(i'.$panqueca->id.');
                                }
                            });
                            $("#dec'.$panqueca->id.'"  ).click(function(){ 
                                i'.$panqueca->id.'--;
                                if(i'.$panqueca->id.' >= 0){
                                    $("#ctd'.$panqueca->id.'").val(i'.$panqueca->id.');
                                }
                            });
                        ');
                       } //end foreach panquecas
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_panquecas"  id="obs_panquecas" class="form-control" value="<?php echo($observaciones[0]['obs_panquecas']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- End Tortas -->
        <!-- Postres -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Waffles</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($waffles as $key => $waffle) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($waffle->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($waffle->id) ?>" id="ctd<?php echo($waffle->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($waffle->id) ?>" id="area<?php echo($waffle->id) ?>" value="<?php echo($waffle->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$waffle->id.' = 0;
                            $("#inc'.$waffle->id.'"  ).click(function(){ 
                                i'.$waffle->id.'++;
                                if(i'.$waffle->id.' >= 0){
                                    $("#ctd'.$waffle->id.'").val(i'.$waffle->id.');
                                }
                            });
                            $("#dec'.$waffle->id.'"  ).click(function(){ 
                                i'.$waffle->id.'--;
                                if(i'.$waffle->id.' >= 0){
                                    $("#ctd'.$waffle->id.'").val(i'.$waffle->id.');
                                }
                            });
                        ');
                       } //end foreach panquecas
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_waffles"  id="obs_waffles" class="form-control" value="<?php echo($observaciones[0]['obs_waffles']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- End Postres -->
         <!-- Postres -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Adicionales</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($adicionale as $key => $adicionale_) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($adicionale_->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($adicionale_->id) ?>" id="ctd<?php echo($adicionale_->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($adicionale_->id) ?>" id="area<?php echo($adicionale_->id) ?>" value="<?php echo($adicionale_->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$adicionale_->id.' = 0;
                            $("#inc'.$adicionale_->id.'"  ).click(function(){ 
                                i'.$adicionale_->id.'++;
                                if(i'.$adicionale_->id.' >= 0){
                                    $("#ctd'.$adicionale_->id.'").val(i'.$adicionale_->id.');
                                }
                            });
                            $("#dec'.$adicionale_->id.'"  ).click(function(){ 
                                i'.$adicionale_->id.'--;
                                if(i'.$adicionale_->id.' >= 0){
                                    $("#ctd'.$adicionale_->id.'").val(i'.$adicionale_->id.');
                                }
                            });
                        ');
                       } //end foreach panquecas
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_adicionales"  id="obs_adicionales" class="form-control" value="<?php echo($observaciones[0]['obs_adicionales']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- End Postres -->
        <!-- Postres -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Croissants</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($croissants as $key => $croissant) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($croissant->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($croissant->id) ?>" id="ctd<?php echo($croissant->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($croissant->id) ?>" id="area<?php echo($croissant->id) ?>" value="<?php echo($croissant->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$croissant->id.' = 0;
                            $("#inc'.$croissant->id.'"  ).click(function(){ 
                                i'.$croissant->id.'++;
                                if(i'.$croissant->id.' >= 0){
                                    $("#ctd'.$croissant->id.'").val(i'.$croissant->id.');
                                }
                            });
                            $("#dec'.$croissant->id.'"  ).click(function(){ 
                                i'.$croissant->id.'--;
                                if(i'.$croissant->id.' >= 0){
                                    $("#ctd'.$croissant->id.'").val(i'.$croissant->id.');
                                }
                            });
                        ');
                       } //end foreach panquecas
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_croissants"  id="obs_croissants" class="form-control" value="<?php echo($observaciones[0]['obs_croissants']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- End Postres -->
        <!-- Postres -->
        <div class="col-md-12 bg-respoteria">
            <h2 class="respoteria">Postres</h2>
            <table class="table table-bordered table-comanda">
                <tr>
                    <th>Producto</th>
                    <th>Pedido</th>
                </tr>
                    <?php  
                        foreach ($postres as $key => $postre) {
                    ?>
                <tr>
                        <td><!-- Producto -->
                            <?php  echo($postre->producto) ?>
                        </td>
                        <!-- Botones e Input-->
                        
                        <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($postre->id) ?>" id="ctd<?php echo($postre->id) ?>" placeholder="0" class="form-control rigth">
                            <input type="hidden" name="area<?php echo($postre->id) ?>" id="area<?php echo($postre->id) ?>" value="<?php echo($postre->area) ?>"></td>
                        
                    <?php 
                        $this->registerJs('
                            var i'.$postre->id.' = 0;
                            $("#inc'.$postre->id.'"  ).click(function(){ 
                                i'.$postre->id.'++;
                                if(i'.$postre->id.' >= 0){
                                    $("#ctd'.$postre->id.'").val(i'.$postre->id.');
                                }
                            });
                            $("#dec'.$postre->id.'"  ).click(function(){ 
                                i'.$postre->id.'--;
                                if(i'.$postre->id.' >= 0){
                                    $("#ctd'.$postre->id.'").val(i'.$postre->id.');
                                }
                            });
                        ');
                       } //end foreach panquecas
                    ?>
                </tr>
                <tr>
                    <td colspan="2" class="tooltip_">
                        <span class="tooltiptext">Incluya las Observaciones</span>
                        <input type="text" placeholder="Observaciones" name="obs_postres"  id="obs_postres" class="form-control" value="<?php echo($observaciones[0]['obs_postres']) ?>">
                    </td>
                </tr>
            </table>     
        </div><!-- div class col-md-12 -->
        <!-- End Postres -->

    <div class="form-group button-send">
        <?= Html::submitButton(Yii::t('app', 'Enviar'), ['class' => 'btn btn_custom']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?php
        $pId = explode(",",$productosUpdate[0]->id_productos);
        $pCtd = explode(",",$productosUpdate[0]->ctd);
        for ($i=0; $i < count($pId) ; $i++) { 
            //echo $pId[$i];
            //echo $pCtd[$i];
            $this->registerJs('
                $("#ctd'.$pId[$i].'").val('.$pCtd[$i].');
                $("td #ctd'.$pId[$i].'").css({"background":"#74ac37",
                                            "color":"#fff"
                                            });
            ');
        }

        $this->registerJs('
            if($("#obs_clasicos").val() != ""){$("#obs_clasicos").css({"background":"#74ac37","color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_alinados").val() != ""){$("#obs_alinados").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_especiales").val() != ""){$("#obs_especiales").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_autor").val() != ""){$("#obs_autor").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_metodos").val() != ""){$("#obs_metodos").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_frappuchinos").val() != ""){$("#obs_frappuchinos").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_frullatos").val() != ""){$("#obs_frullatos").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_sandwish").val() != ""){$("#obs_sandwish").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_tequenos").val() != ""){$("#obs_tequenos").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_panquecas").val() != ""){$("#obs_panquecas").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_waffles").val() != ""){$("#obs_waffles").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_adicionales").val() != ""){$("#obs_adicionales").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_croissants").val() != ""){$("#obs_croissants").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
            if($("#obs_postres").val() != ""){$("#obs_postres").css({"background":"#74ac37", "color":"#fff", "text-transform":"uppercase"})}
        ');
?>