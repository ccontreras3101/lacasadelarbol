<?php

use yii\helpers\Html;
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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Nueva Comanda'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <table class="table table-striped table-bordered">
        <tr>
            <th class='center'>
                Id
            </th>
            <th class='center'>
                Producto
            </th>
            <th class='center'>
                Ctd
            </th>
            <th class='center'>
                Usuario
            </th>
            <th class='center'>
                Mesa
            </th>
            <th class='center'>
                Estado
            </th>
            <th class='center'>
                Opciones
            </th  >
        </tr>
        <s
        <tr>
            <?php foreach ($model as $key => $value) {?>
                <td>
                    <?php echo $value['id']?>
                </td>
                <td>
                    <?php  
                        $productos_id = explode(",",$value['id_productos']);
                        foreach ($productos_id as $key => $value_productos) {
                            $productos = TbPrecios::find()->select(['producto'])->where(['id' => $value_productos])->one(); 
                            echo "<span>".$productos['producto']."</span>";
                        }
                        
                    ?>
                    
                </td>
                <td>
                    <?php 
                        $ctd = explode(",",$value['ctd']);
                        foreach ($ctd as $key => $value_ctd) {
                           echo "<span class='center'>".$value_ctd."</span>";
                        }
                    ?>
                </td>
                <td class='center'>
                    <?php 
                        $usuario = TbUsuarios::find()->where(['id' => $value['id_usuario']])->one();
                        echo $usuario->nombres.", ".$usuario->apellidos ;
                    ?>
                </td>
                <td class='center'>
                    <?php echo $value['id_mesa']?>
                </td>
                <td>
                    <?php 
                        if($value['status'] == 0){
                            echo "En proceso"; 
                        }
                        if($value['status'] == 1){
                            echo "En Despacho";
                        }
                        if($value['status'] == 2){
                            echo "Entregado";
                        }
                    
                    ?>
                </td>
                <td>
                    <?= Html::a(Yii::t('app', 'Editar'), ['update', 'id' => $value['id'], 
                                              'id_cliente' => $value['id_cliente'],
                                              'id_productos' => $value['id_productos'], 
                                            ], 
                                                ['class' => 'btn btn-primary']); 
                    ?>  
                    <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $value['id']], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('app', 'Está seguro de eliminar ésta comanda?'),
                                'method' => 'post',
                            ],
                        ]); 
                    ?>
                </td>
            <?php } ?>
        </tr>
    </table>
    
    <?php Pjax::end(); ?>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
