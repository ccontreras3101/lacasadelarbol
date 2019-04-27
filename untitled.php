<?php Pjax::begin(); ?>
        <div class="table table-striped table-bordered">
            <?php foreach ($model as $key => $value) {
                if($value['status'] == 0){ ?>

                    <div class="row border comandas_index">
                        <div class="grid col-xs-1">
                            <h4>Id</h4>
                            <?php echo $value['id']."<br>";?>
                            
                            <input  type="hidden" id="tiempo_<?php echo $value['id'] ?>" name="tiempo_<?php echo $value['id'] ?>" value="<?php echo $value['h_pedido'] ?>" />
                            <input type="hidden" name="reloj<?php echo $value['id'] ?>" id="reloj<?php echo $value['id'] ?>" size="10" value=""  /> 
                
                            <?php
                                $this->registerJs('
                                    setInterval(function() {
                                        //hora de pedido  
                                            h_pedido = $("#tiempo_'.$value['id'].'").val();
                                            
                                        //convertir string a fecha
                                            all_time = h_pedido.split(":");
                                            fecha = new Date();
                                            year = parseInt(fecha.getFullYear());
                                            month = parseInt(fecha.getMonth() + 1);
                                            day = parseInt(fecha.getUTCDate());
                                            hour = parseInt(all_time[0]);
                                            min = parseInt(all_time[1]);
                                            sec = parseInt(all_time[2]);
                                            var d = new Date(year, month, day, hour, min, sec, 0);

                                        //alerta a los 10 minutos
                                            d.setSeconds(600);
                                            var alert_1 = new Date(d);
                                            hour_1 = parseInt(alert_1.getHours());
                                            min_1 = parseInt(alert_1.getMinutes());
                                            sec_1 = parseInt(alert_1.getSeconds());

                                        //alerta a los 15 minutos
                                            d.setSeconds(900);
                                            var alert_2 = new Date(d);
                                            hour_2 = parseInt(alert_2.getHours());
                                            min_2 = parseInt(alert_2.getMinutes());
                                            sec_2 = parseInt(alert_2.getSeconds());

                                        //reloj
                                            momentoActual = new Date(); 
                                            hora = parseInt(momentoActual.getHours()); 
                                            minuto = momentoActual.getMinutes(); 
                                            segundo = momentoActual.getSeconds(); 
                                                horaImprimible = hora + ":" + minuto + ":" + segundo;
                                                $("#reloj'.$value['id'].'").val(horaImprimible);
                                        
                                        //ejecuta alerta a lo 10 minutos   
                                            if(hour_1 == hora && min_1 == minuto && sec_1 == segundo){
                                                $("#despacho-mesa_'.$value['id'].'").css({"background":"yellow",
                                                                                            "color" : "#2c2c2c"                                                                                         
                                                                                        });
                                                alert("El pedido de la mesa '.$value['id'].' lleva 10 minutos","5 minutos para tiempo lìmite","success");                                           
                                            }
                                                                                                                 
                                        //ejecuta alerta a los 15 minutos
                                            if(hour_2 == hora && min_2 == minuto && sec_2 == segundo){
                                                 $("#despacho-mesa_'.$value['id'].'").css({"background":"red",
                                                                                            "color" : "#ffffff"                                                                                        
                                                                                        });
                                                 alert("El pedido de la mesa '.$value['id'].' llegò al lìmite de tiempo","tiempo expirado","success");
                                            }
                                    }, 1000);');// cierra setInterval
                            ?>
                        </div>

                        <div class="grid col-xs-3">
                            <h4>Productos</h4>
                            <?php  
                                $productos_id = explode(",",$value['id_precios']);
                                foreach ($productos_id as $key => $value_productos) {
                                    $productos = TbPrecios::find()->select(['producto','area'])->where(['id' => $value_productos])->one();
                                        echo  " <span>".$productos['producto']."(".$productos['area'].")"."<div class=".'pedido_ctd'."> Ctd: ".$value['ctd'][0]."</div> </span>" ;
                                } ?>
                        </div>
                        <div class=" grid col-xs-1">
                            <h4>Obs.</h4>
                            <?php
                                if($value['obs_expressos'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_expressos']."</span>";
                                }
                                if($value['obs_lattes'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_lattes']."</span>";
                                }
                                if($value['obs_bfrias'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_bfrias']."</span>";
                                }
                                if($value['obs_energy'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_energy']."</span>";
                                }
                                if($value['obs_shake'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_shake']."</span>";
                                }
                                if($value['obs_fruits'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_fruits']."</span>";
                                }
                                if($value['obs_paninis'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_paninis']."</span>";
                                }
                                if($value['obs_salads'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_salads']."</span>";
                                }
                                if($value['obs_hotcakes'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_hotcakes']."</span>";
                                }
                                if($value['obs_cakes'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_cakes']."</span>";
                                }
                                if($value['obs_deserts'] != ""){
                                    echo "<span class=obs_ >" .$value['obs_deserts']."</span>";
                                }

                            ?>
                        </div>
                        
                        <div class=' grid col-xs-2 center left-responsive'>
                            <h4>Usuario</h4>
                            <?php 
                                $usuario = TbUsuarios::find()->where(['id' => $value['id_usuario']])->one();
                                echo $usuario->nombres.", ".$usuario->apellidos ;
                            ?>
                        </div>
                        <div class='grid col-xs-1 center'>
                            <h4>Mesa</h4>
                            <?php echo $value['id_mesa']?>
                        </div>
                    <?php if(Yii::$app->user->identity->id_rol <= 3 ){ ?>
                        <div class="grid col-xs-1">
                            <h4>Estado</h4>
                            <div class="status<?php echo $value['id']?>" >
                            <?php 
                                if($value['status'] == 0){
                                    echo Html::a(Yii::t('app', 'En proceso'), ['todolisto', 'id' => $value['id']], 
                                                [
                                                    'class' => 'despacho' ,
                                                    'id' => 'despacho-mesa_'.$value['id'],
                                                    'name' => 'despacho-mesa_'.$value['id'],
                                                    'title' => 'Entrega',
                                                    'data' => [
                                                        'confirm' => Yii::t('app', 'Ya está entregado todo?'),
                                                        'method' => 'post',
                                                    ],
                                    ]); 
                                }
                                if($value['status'] == 1){
                                    echo "";
                                    $this->registerJs('
                                        $(".status'.$value['id'].'").css({
                                               "background" : "green",
                                               "color" : "#fff",
                                               "display": "inline-flex",
                                                "padding": "5px",
                                                "border-radius": "5px",
                                                "margin-bottom": "5px"
                                            });
                                        ');
                                    echo Html::img('/moa/web/images/happy.png', ['class' => 'img_index_listo']);
                                }
                            ?>
                            </div>
                        </div>
                    <?php } ?>
                    
                        <div class="grid col-xs-1">
                            <h4>Cafe</h4>
                            <div class="status_cafe<?php echo $value['id']?>" >
                                <?php
                                    if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 4){
                                        if($value['status_cafe'] == 0){
                                                echo "";
                                            }
                                            if($value['status_cafe'] == 1){
                                            echo Html::a(Yii::t('app', 'En Proceso'), ['despachocafe', 'id' => $value['id']], 
                                                                    [
                                                                        'class' => 'despacho' ,
                                                                        'id' => 'despacho-cafe_'.$value['id'],
                                                                        'name'=> 'despacho-cafe_'.$value['id'],
                                                                        'title' => 'En Proceso'
                                                                    ]); 
                                            }
                                        }
                                            if($value['status_cafe'] == 2){
                                                echo "Listo";
                                                $this->registerJs('
                                                    $(".status_cafe'.$value['id'].'").css({
                                                           "background" : "green",
                                                           "color" : "#fff",
                                                           "display": "inline-flex",
                                                            "padding": "5px",
                                                            "border-radius": "5px",
                                                            "margin-bottom": "5px"
                                                        });
                                                    ');
                                                echo Html::img('/moa/web/images/coffe.png', ['class' => 'img_index_listo']);
                                            }
                                    ?>
                            </div>
                        </div>
                    
                        <div class="grid col-xs-1">
                            <h4>Cocina</h4>
                            <div class="status_cocina<?php echo $value['id']?>" >
                            <?php
                                if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 5){
                                    if($value['status_cocina'] == 0){
                                            echo "";
                                            
                                        }
                                        if($value['status_cocina'] == 1){
                                        echo    Html::a(Yii::t('app', 'En Proceso'), ['despachococina', 'id' => $value['id'], 
                                                              'id_cliente' => $value['id_cliente'],
                                                              'id_precios' => $value['id_precios'],
                                                              'id_usuario' => $value['id_usuario'], 
                                                            ], 
                                                                [
                                                                    'class' => 'despacho' ,
                                                                    'id' => 'despacho-cocina_'.$value['id'],
                                                                    'name' => 'despacho-cocina_'.$value['id'],
                                                                    'title' => 'Despachar'
                                                                ]); 
                                        }
                                    }
                                        if($value['status_cocina'] == 2){
                                            echo "Listo";
                                            $this->registerJs('
                                                $(".status_cocina'.$value['id'].'").css({
                                                       "background" : "green",
                                                       "color" : "#fff",
                                                       "display": "inline-flex",
                                                        "padding": "5px",
                                                        "border-radius": "5px",
                                                        "margin-bottom": "5px"
                                                    });
                                                ');
                                            echo Html::img('/moa/web/images/kitchen.png', ['class' => 'img_index_listo']);
                                        }
                                   
                                ?>
                            </div>
                        </div>

                        <div class="grid col-xs-1 center">
                            <!-- Rol de Meseros -->
                            <?php if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 3) { ?>
                            <h4>Opt</h4>
                                <?= Html::a(Yii::t('app', ''), ['view', 'id' => $value['id'], 
                                                          'id_cliente' => $value['id_cliente'],
                                                          'id_precios' => $value['id_precios'],
                                                          'id_usuario' => $value['id_usuario'], 
                                                        ], 
                                                            [
                                                                'class' => 'glyphicon glyphicon-eye-open',
                                                                'title' => 'Ver'
                                                            ]); 
                                ?> 
                                <?= Html::a(Yii::t('app', ''), ['update', 'id' => $value['id'], 
                                                          'id_cliente' => $value['id_cliente'],
                                                          'id_precios' => $value['id_precios'], 
                                                        ], 
                                                            [
                                                                'class' => 'glyphicon glyphicon-pencil',
                                                                'title' => 'Editar'
                                                            ]); 
                                ?>  
                               
                            <?php } else { ?>
                            <h4>Ver</h4>    
                
                                 <?= Html::a(Yii::t('app', ''), ['view', 'id' => $value['id'], 
                                                          'id_cliente' => $value['id_cliente'],
                                                          'id_precios' => $value['id_precios'],
                                                          'id_usuario' => $value['id_usuario'], 
                                                        ], 
                                                            [
                                                                'class' => 'glyphicon glyphicon-eye-open',
                                                                'title' => 'Ver'
                                                            ]); 
                                ?>  
                            <?php } ?>
                            <!-- en rol de Cafe-->
                        </div>
                    </div>    
            <?php } }?>
        </div>
    <?php Pjax::end(); ?>



     // $.get("'//.$model.'", function(data){
       //    alert("Data: " + data);
       //  });
       //  //setInterval(function(){
       //  //    $("#table").load(location.href+ " #id");
       //      console.log($("#id").text());
       // // },1000);


       <?php 
    $this->registerJs('
       // $.get("'/*.$model.*/'", function(data){
       //    alert("Data: " + data);
       //  });
       //  //setInterval(function(){
       //  //    $("#table").load(location.href+ " #id");
       //      console.log($("#id").text());
       // // },1000);
        // $("#ajaxCall").click(function(){
        //     $.ajax({
        //     type     :"POST",
        //     data: {name: "myfilename"},
        //     url  : "/*Yii::$app->urlManager->parseRequest($request)*/",
        //         success  : function(response) {
        //             console.log("success: "+response.filename);
        //         },
        //         error: function(){
        //             console.log("failure");
        //         }
        //     });return false; //end ajax call
        // });//end click function

    ');
?>
