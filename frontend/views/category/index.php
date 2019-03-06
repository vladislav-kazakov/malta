<?php

/* @var $this yii\web\View */

/* @var $category \common\models\Category */

use yii\helpers\Html;
use common\models\Category;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Categories');

$this->params['breadcrumbs'] = [
    $this->title,
];

$script = <<< JS

$(document).ready(function () {
    var container = $('.categories');

    container.imagesLoaded(function () {
        container.masonry();
    });
});

JS;

$this->registerCssFile('css/category.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJsFile('/js/masonry.pkgd.min.js', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJsFile('/js/imagesloaded.pkgd.min.js', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJs($script, yii\web\View::POS_READY);
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($categories)): ?>
    <div class="categories row">
        <?php foreach ($categories as $category): ?>
            <div class="col-xs-12 col-sm-6">
                <a href="<?= Url::to(['category/view', 'id' => $category->id]) ?>" class="category-item">
                        <div class="row">
                            <?= Html::img(Category::SRC_IMAGE . '/' . $category->thumbnailImage, ['class' => 'img-responsive']) ?>
                        </div>
                        <h3>
                            <?= $category->name ?>
                        </h3>
                        <?= $category->annotation ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
