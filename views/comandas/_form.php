<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use app\models\Mesas;
use app\models\TbClientes;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\TbComandas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-comandas-form">    
    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="id_usuario" value="<?php echo Yii::$app->user->identity->id  ?>">
    <div class="row">
        <div class="col-md-12">
            <label>Cedula Cliente</label>
                <?php
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
                <h2 class="respoteria">Expressos</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($expressos as $key => $expresso) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($expresso->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($expresso->id) ?>" id="ctd<?php echo($expresso->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($expresso->id) ?>" id="area<?php echo($expresso->id) ?>" value="<?php echo($expresso->area) ?>" ></td>
                            
                        <?php 
                            $this->registerJs('
                                var va'.$expresso->id.' = $("#ctd'.$expresso->id.'").val();
                                var x'.$expresso->id.' =  0;
                                var i'.$expresso->id.' = 0;
                                
                                $("#ctd'.$expresso->id.'").change(function(){
                                    var x'.$expresso->id.' =  1;
                                    return (x'.$expresso->id.');
                                });

                                $("#inc'.$expresso->id.'"  ).click(function(){ 
                                    i'.$expresso->id.'++;
                                    if(i'.$expresso->id.' >= 0){
                                        $("#ctd'.$expresso->id.'").val(i'.$expresso->id.');
                                    }
                                    if(x'.$expresso->id.' =  1){
                                        $("#ctd'.$expresso->id.'").val(va'.$expresso->id.' +  i'.$expresso->id.');
                                    }
    
                                });

                                $("#dec'.$expresso->id.'"  ).click(function(){ 
                                    i'.$expresso->id.'--;
                                    if(i'.$expresso->id.' >= 0){
                                        $("#ctd'.$expresso->id.'").val(i'.$expresso->id.');
                                    }
                                    
                                });
                            ');
                           } //end foreach clasicos
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_expressos"  id="obs_expressos" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!--end expressos-->
            <!-- Lattes-->
            <div class="col-md-12 bg-respoteria">
                <h2 class="respoteria">Lattes</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($lattes as $key => $latte) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($latte->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($latte->id) ?>" id="ctd<?php echo($latte->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($latte->id) ?>" id="area<?php echo($latte->id) ?>" value="<?php echo($latte->area) ?>"></td>
                            
                        <?php 
                            $this->registerJs('
                                var i'.$latte->id.' = 0;
                                $("#inc'.$latte->id.'"  ).click(function(){ 
                                    i'.$latte->id.'++;
                                    if(i'.$latte->id.' >= 0){
                                        $("#ctd'.$latte->id.'").val(i'.$latte->id.');
                                    }
                                });
                                $("#dec'.$latte->id.'"  ).click(function(){ 
                                    i'.$latte->id.'--;
                                    if(i'.$latte->id.' >= 0){
                                        $("#ctd'.$latte->id.'").val(i'.$latte->id.');
                                    }
                                });
                            ');
                           } //end foreach especiales
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_lattes"  id="obs_lattes" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!--end especiales -->
            <!-- Bedidas Frias -->
            <div class="col-md-12 bg-respoteria">
                <h2 class="respoteria">Bedidas Frias</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($bfrias as $key => $bfria) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($bfria->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($bfria->id) ?>" id="ctd<?php echo($bfria->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($bfria->id) ?>" id="area<?php echo($bfria->id) ?>" value="<?php echo($bfria->area) ?>"></td>
                            
                        <?php 
                            $this->registerJs('
                                var i'.$bfria->id.' = 0;
                                $("#inc'.$bfria->id.'"  ).click(function(){ 
                                    i'.$bfria->id.'++;
                                    if(i'.$bfria->id.' >= 0){
                                        $("#ctd'.$bfria->id.'").val(i'.$bfria->id.');
                                    }
                                });
                                $("#dec'.$bfria->id.'"  ).click(function(){ 
                                    i'.$bfria->id.'--;
                                    if(i'.$bfria->id.' >= 0){
                                        $("#ctd'.$bfria->id.'").val(i'.$bfria->id.');
                                    }
                                });
                            ');
                           } //end foreach aliñados
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_bfrias"  id="obs_bfrias" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!-- end bebidas Bedidas Frias -->
        </div>
        <div class="row">
            <!-- Energy -->
            <div class="col-md-12 bg-respoteria">
                <h2 class="respoteria">Energy</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($energy as $key => $energy_) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($energy_->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($energy_->id) ?>" id="ctd<?php echo($energy_->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($energy_->id) ?>" id="area<?php echo($energy_->id) ?>" value="<?php echo($energy_->area) ?>"></td>
                            
                        <?php 
                            $this->registerJs('
                                var i'.$energy_->id.' = 0;
                                $("#inc'.$energy_->id.'"  ).click(function(){ 
                                    i'.$energy_->id.'++;
                                    if(i'.$energy_->id.' >= 0){
                                        $("#ctd'.$energy_->id.'").val(i'.$energy_->id.');
                                    }
                                });
                                $("#dec'.$energy_->id.'"  ).click(function(){ 
                                    i'.$energy_->id.'--;
                                    if(i'.$energy_->id.' >= 0){
                                        $("#ctd'.$energy_->id.'").val(i'.$energy_->id.');
                                    }
                                });
                            ');
                           } //end foreach autor
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_energy"  id="obs_energy" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!-- End Energy -->
            <!-- Malteadas -->
            <div class="col-md-12 bg-respoteria">
                <h2 class="respoteria">Malteadas</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($shake as $key => $shake_) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($shake_->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($shake_->id) ?>" id="ctd<?php echo($shake_->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($shake_->id) ?>" id="area<?php echo($shake_->id) ?>" value="<?php echo($shake_->area) ?>"></td>
                            
                        <?php 
                            $this->registerJs('
                                var i'.$shake_->id.' = 0;
                                $("#inc'.$shake_->id.'"  ).click(function(){ 
                                    i'.$shake_->id.'++;
                                    if(i'.$shake_->id.' >= 0){
                                        $("#ctd'.$shake_->id.'").val(i'.$shake_->id.');
                                    }
                                });
                                $("#dec'.$shake_->id.'"  ).click(function(){ 
                                    i'.$shake_->id.'--;
                                    if(i'.$shake_->id.' >= 0){
                                        $("#ctd'.$shake_->id.'").val(i'.$shake_->id.');
                                    }
                                });
                            ');
                           } //end foreach metodos
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_shake"  id="obs_shake" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!-- end Malteadas-->
            <!--Merengadas de Frutas -->
            <div class="col-md-12 bg-respoteria">
                <h2 class="respoteria">Merengadas de Frutas</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($fruits as $key => $fruit) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($fruit->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($fruit->id) ?>" id="ctd<?php echo($fruit->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($fruit->id) ?>" id="area<?php echo($fruit->id) ?>" value="<?php echo($fruit->area) ?>"></td>
                            
                        <?php 
                            $this->registerJs('
                                var i'.$fruit->id.' = 0;
                                $("#inc'.$fruit->id.'"  ).click(function(){ 
                                    i'.$fruit->id.'++;
                                    if(i'.$fruit->id.' >= 0){
                                        $("#ctd'.$fruit->id.'").val(i'.$fruit->id.');
                                    }
                                });
                                $("#dec'.$fruit->id.'"  ).click(function(){ 
                                    i'.$fruit->id.'--;
                                    if(i'.$fruit->id.' >= 0){
                                        $("#ctd'.$fruit->id.'").val(i'.$fruit->id.');
                                    }
                                });
                            ');
                           } //end foreach frappuchinos
                        ?>
                    </tr>
                    <tr>
                       <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_fruits"  id="obs_fruits" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!-- End Merengadas de Frutas -->
        </div><!-- div class row -->
        <div class="row">
            <!-- Paninis -->
            <div class="col-md-12 bg-respoteria">
                <h2 class="respoteria">Paninis</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($paninis as $key => $panini) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($panini->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($panini->id) ?>" id="ctd<?php echo($panini->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($panini->id) ?>" id="area<?php echo($panini->id) ?>" value="<?php echo($panini->area) ?>"></td>
                            
                        <?php 
                            $this->registerJs('
                                var i'.$panini->id.' = 0;
                                $("#inc'.$panini->id.'"  ).click(function(){ 
                                    i'.$panini->id.'++;
                                    if(i'.$panini->id.' >= 0){
                                        $("#ctd'.$panini->id.'").val(i'.$panini->id.');
                                    }
                                });
                                $("#dec'.$panini->id.'"  ).click(function(){ 
                                    i'.$panini->id.'--;
                                    if(i'.$panini->id.' >= 0){
                                        $("#ctd'.$panini->id.'").val(i'.$panini->id.');
                                    }
                                });
                            ');
                           } //end foreach frullatos
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_paninis"  id="obs_paninis" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!-- End Paninis -->
             <!--Ensaladas -->
            <div class="col-md-12 bg-respoteria">
                <h2 class="respoteria">Ensaladas</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($salads as $key => $salad) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($salad->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($salad->id) ?>" id="ctd<?php echo($salad->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($salad->id) ?>" id="area<?php echo($salad->id) ?>" value="<?php echo($salad->area) ?>"></td>
                            
                        <?php 
                            $this->registerJs('
                                var i'.$salad->id.' = 0;
                                $("#inc'.$salad->id.'"  ).click(function(){ 
                                    i'.$salad->id.'++;
                                    if(i'.$salad->id.' >= 0){
                                        $("#ctd'.$salad->id.'").val(i'.$salad->id.');
                                    }
                                });
                                $("#dec'.$salad->id.'"  ).click(function(){ 
                                    i'.$salad->id.'--;
                                    if(i'.$salad->id.' >= 0){
                                        $("#ctd'.$salad->id.'").val(i'.$salad->id.');
                                    }
                                });
                            ');
                           } //end foreach cakes
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_salads"  id="obs_salads" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!-- End Ensaladas -->
            <!-- Pancakes -->
            <div class="col-md-12 bg-respoteria">
                <h2 class="respoteria">Pancakes</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($hotcakes as $key => $hotcake) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($hotcake->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($hotcake->id) ?>" id="ctd<?php echo($hotcake->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($hotcake->id) ?>" id="area<?php echo($hotcake->id) ?>" value="<?php echo($hotcake->area) ?>"></td>
                            
                        <?php 
                            $this->registerJs('
                                var i'.$hotcake->id.' = 0;
                                $("#inc'.$hotcake->id.'"  ).click(function(){ 
                                    i'.$hotcake->id.'++;
                                    if(i'.$hotcake->id.' >= 0){
                                        $("#ctd'.$hotcake->id.'").val(i'.$hotcake->id.');
                                    }
                                });
                                $("#dec'.$hotcake->id.'"  ).click(function(){ 
                                    i'.$hotcake->id.'--;
                                    if(i'.$hotcake->id.' >= 0){
                                        $("#ctd'.$hotcake->id.'").val(i'.$hotcake->id.');
                                    }
                                });
                            ');
                           } //end foreach sandwish
                        ?>
                    </tr>
                    <tr>
                       <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_hotcakes"  id="obs_hotcakes" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!-- End Pancakes -->  
        </div>
        <div class="row">
            <!--Tortas -->
            <div class="col-md-12 bg-respoteria">
                <h2 class="respoteria">Tortas</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($cakes as $key => $cake) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($cake->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($cake->id) ?>" id="ctd<?php echo($cake->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($cake->id) ?>" id="area<?php echo($cake->id) ?>" value="<?php echo($cake->area) ?>"></td>
                            
                        <?php 
                            $this->registerJs('
                                var i'.$cake->id.' = 0;
                                $("#inc'.$cake->id.'"  ).click(function(){ 
                                    i'.$cake->id.'++;
                                    if(i'.$cake->id.' >= 0){
                                        $("#ctd'.$cake->id.'").val(i'.$cake->id.');
                                    }
                                });
                                $("#dec'.$cake->id.'"  ).click(function(){ 
                                    i'.$cake->id.'--;
                                    if(i'.$cake->id.' >= 0){
                                        $("#ctd'.$cake->id.'").val(i'.$cake->id.');
                                    }
                                });
                            ');
                           } //end foreach cakes
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_cakes"  id="obs_cakes" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!-- End Tortas -->
            <!-- Postres -->
            <div class="col-md-12 bg-respoteria">
                <h2 class="respoteria">Postres</h2>
                <table class="table table-bordered table-comanda">
                    <tr>
                        <th>Producto</th>
                        <th>Pedido</th>
                    </tr>
                        <?php  
                            foreach ($deserts as $key => $desert) {
                        ?>
                    <tr>
                            <td><!-- Producto -->
                                <?php  echo($desert->producto) ?>
                            </td>
                            <!-- Botones e Input-->
                            
                            <td class="input-value"><input type="number"  min="0" name="ctd<?php echo($desert->id) ?>" id="ctd<?php echo($desert->id) ?>" placeholder="0" class="form-control rigth">
                                <input type="hidden" name="area<?php echo($desert->id) ?>" id="area<?php echo($desert->id) ?>" value="<?php echo($desert->area) ?>"></td>
                            
                        <?php 
                            $this->registerJs('
                                var i'.$desert->id.' = 0;
                                $("#inc'.$desert->id.'"  ).click(function(){ 
                                    i'.$desert->id.'++;
                                    if(i'.$desert->id.' >= 0){
                                        $("#ctd'.$desert->id.'").val(i'.$desert->id.');
                                    }
                                });
                                $("#dec'.$desert->id.'"  ).click(function(){ 
                                    i'.$desert->id.'--;
                                    if(i'.$desert->id.' >= 0){
                                        $("#ctd'.$desert->id.'").val(i'.$desert->id.');
                                    }
                                });
                            ');
                           } //end foreach panquecas
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" class="tooltip_">
                            <span class="tooltiptext">Incluya las Observaciones</span>
                            <input type="text" placeholder="Observaciones" name="obs_deserts"  id="obs_deserts" class="form-control">
                        </td>
                    </tr>
                </table>     
            </div><!-- div class col-md-12 -->
            <!-- End Postres -->
        </div><!-- row -->

    <div class="form-group button-send">
        <?= Html::submitButton(Yii::t('app', 'Enviar'), ['class' => 'btn btn_custom']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

