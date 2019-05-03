<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbComandas */

$this->title = Yii::t('app', 'Comandas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lista de Comandas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-comandas-create">
	<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4><i class="icon fa fa-check"></i>Saved!</h4>
    <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-error alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4><i class="icon fa fa-check"></i>Saved!</h4>
    <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

    <h1><?= Html::encode($this->title) ?></h1>
	

    <?= $this->render('_form', [
        'model' => $model,
 		'clientes'=>$clientes,
        'clasicos' => $clasicos,
        'alinados' => $alinados,
        'especiales' => $especiales,
        'autor' => $autor,
        'metodos' => $metodos,
        'frappuchin' => $frappuchin,
        'frullatos' => $frullatos,
        'sandwish' => $sandwish,
        'tequenos' => $tequenos,
        'panquecas' => $panquecas,
        'waffles' => $waffles,
        'adicionale' => $adicionale,
        'croissants' => $croissants,
        'postres' => $postres,

    ]) ?>

</div>
