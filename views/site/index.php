<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'La Casa del Arbol';
?>
<div class="site-index">
<a href="https://colorlib.com/preview/theme/eatwell/#section-menu"></a>
    <div class="row about margin-index">
        <div class="menu quienes">
            <h1>Quienes Somos?</h1>
        </div>
        <div class=" col-sm-12 col-md-6 col-lg-6">
            <span>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer consequat fringilla mattis. Nullam convallis feugiat turpis, vitae auctor neque viverra non. Curabitur a nunc lacus. Sed convallis arcu mi, eget condimentum tellus lacinia eget. Phasellus ultrices a leo eget molestie. Sed dolor magna, scelerisque at faucibus quis, elementum nec enim. Phasellus eu purus vitae nunc imperdiet varius nec eu odio. Cras porta gravida feugiat. Ut velit lectus, posuere ut lacinia sit amet, vehicula a est. Nam euismod magna quis sem aliquam commodo.
            </span>
            
        </div>
        <div class=" col-sm-12 col-md-6 col-lg-6">
            <?php echo Html::img('/lacasadelarbol/web/images/b&w.jpg', ['class' => 'pull-left img-responsive']); ?>
        </div>
    </div>

    <div class="row gallery">
        <div class="menu ">
            <h1>Menú</h1>
        </div>
        <div class="carousel carousel_index">
            <div class="row">    
                <div class="col-md-8 col-sm-8 sm-dev">
                    <?php echo Html::img('/lacasadelarbol/web/images/croissants.png', ['class' => 'carousel--img ']); ?>
                </div>
                <div class="col-md-4 col-sm-4 sm-dev">
                    <?php echo Html::img('/lacasadelarbol/web/images/sandwish.png', ['class' => 'carousel--img ']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5 sm-dev">
                    <?php echo Html::img('/lacasadelarbol/web/images/expresso_.png', ['class' => 'carousel--img ']); ?>
                </div>
                <div class="col-md-3 col-sm-3 sm-dev">
                    <?php echo Html::img('/lacasadelarbol/web/images/reposteria.png', ['class' => 'carousel--img ']); ?>
                </div>
                <div class="col-md-4 col-sm-4 sm-dev">
                    <?php echo Html::img('/lacasadelarbol/web/images/coffe.png', ['class' => 'carousel--img ']); ?>
                </div>
            </div>
       </div>   
    </div>              
</div>

