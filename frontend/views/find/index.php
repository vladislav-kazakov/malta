<?php

/* @var $this yii\web\View */

/* @var $find \common\models\Find */

use yii\helpers\Html;
use common\models\Find;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Collection');

$this->params['breadcrumbs'] = [
    $this->title,
];

$script = <<< JS

$(document).ready(function () {
    var container = $('.finds');

    container.imagesLoaded(function () {
        container.masonry();
    });
});

JS;

$this->registerCssFile('css/find.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJsFile('/js/masonry.pkgd.min.js', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJsFile('/js/imagesloaded.pkgd.min.js', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJs($script, yii\web\View::POS_READY);
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($finds)): ?>
    <div class="finds row">
        <?php foreach ($finds as $find): ?>
            <div class="col-xs-6 col-sm-4 col-sm-3">
                <a href="<?= Url::to(['find/view', 'id' => $find->id]) ?>" class="find-item">
                        <div class="row">
                            <?= Html::img(Find::SRC_IMAGE . '/' . $find->thumbnailImage, ['class' => 'img-responsive']) ?>
                        </div>
                        <h3>
                            <?= $find->name ?>
                        </h3>
                        <?= $find->annotation ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
