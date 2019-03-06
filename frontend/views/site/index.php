<?php

/* @var $this yii\web\View */


$this->registerCssFile('css/home.css?201902172259', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);

$this->title = Yii::$app->name;
?>

<?= $this->render('_banner', ['bannerImages' => $bannerImages]) ?>

<div class="row">
    <div class="col-xs-12">
        <p>
            <?= Yii::t('home', 'text text text.') ?>
        </p>
    </div>

    <div class="clearfix"></div>
    <br>
</div>
