<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="icon" href="web/images/favicon.png" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>

<?php $this->beginBody() ?>
<div id="bg-image-index" name="bg-image-index" class="bg-image">
    <div id="jumbotron" name="jumbotron" class="jumbotron">
        
    </div>
</div>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('/lacasadelarbol/web/images/logo-menu.png', ['alt'=>'La casa del arbol', 'class' => 'img_logo']),
        //'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Salir (' . Yii::$app->user->identity->fullname .')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )

        ],
    ]);
        if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 1) {
             echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                        ['label' => 'Usuarios', 'url' => ['/usuarios/index']],
                        ['label' => 'Clientes', 'url' => ['clientes/index'], 'items' => [
                            ['label' => 'Listado', 'url' => ['clientes/index']],
                            ['label' => 'Nuevo Cliente', 'url' => ['clientes/create']],
                            ['label' => 'Aviso de Entrega', 'url' => ['clientes/notifications']],
                        ]],
                        ['label' => 'Lista de Comandas', 'url' => ['/comandas/index']],
                        
                        
                ],
            ]);
            echo Html::a("Administracion", '',['class'=> 'rol-user']);

        }
        if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 3) {
             echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                        ['label' => 'Nueva Comanda', 'url' => ['/comandas/create']],
                        ['label' => 'Lista de Comandas', 'url' => ['/comandas/index']],
                        ['label' => 'Clientes', 'url' => ['/clientes/index']],
                        //['label'=> 'Mesas'],  
                ],
            ]);
             echo Html::a("Mesas", '',['class'=> 'rol-user']);
        }
        if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 4) {
             echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                        ['label' => 'Lista de Comandas', 'url' => ['/comandas/index']],
                        //['label'=> 'Café'],
                ],
            ]);
             echo Html::a("Café", '',['class'=> 'rol-user']);
        }
        if (isset(Yii::$app->user->identity->id_rol) &&  Yii::$app->user->identity->id_rol == 5) {
             echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                        ['label' => 'Lista de Comandas', 'url' => ['/comandas/index']],
                        //['label'=> 'Cocina'],
                ],
            ]);
            echo Html::a("Cocina", '',['class'=> 'rol-user']);
        }

        
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        
    </div>

</div>

<footer class="footer">
    <div class="container">
        <div class="row">
lacasadelarbol         <p class="pull-left">&copy; La casa del arbol, Café <?= date('Y') ?></p>
            <div id="mapa" name="mapa puntero">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d494.14727461561426!2d-72.21889142044898!3d7.770920279587511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sve!4v1543418294583" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen>
                </iframe>
                
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
