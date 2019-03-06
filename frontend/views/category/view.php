<?php

/* @var $this yii\web\View */

/* @var $category Category */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Category;
use common\models\Find;

$this->title = $category->name;

$this->params['breadcrumbs'] = [
    ['label' => $category->type->name, 'url' => ['type/view', 'id' => $category->type->id]],
    $this->title,
];


$script = <<< JS

$(document).ready(function () {
    var container = $('.collection');

    container.imagesLoaded(function () {
        container.masonry();
    });
});

JS;

$this->registerJsFile('/js/masonry.pkgd.min.js', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJsFile('/js/imagesloaded.pkgd.min.js', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJs($script, yii\web\View::POS_READY);
$this->registerCssFile('css/category.css?201902191707', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
?>

<?= newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=findImages]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        'playSpeed' => 7000,
        'padding' => 0,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => false,
        'openOpacity' => true,
        'helpers' => [
            'title' => ['type' => 'float'],
            'buttons' => [],
            'thumbs' => ['width' => 68, 'height' => 50],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
        ],
    ]
]) ?>


<?php if (empty($category->image)): ?>
    <?php if (Yii::$app->user->can('manager')): ?>
        <?= Html::a(Yii::t('app', 'Edit'), ['manager/category-update', 'id' => $category->id], ['class' => 'btn btn-primary pull-right']) ?>
    <?php endif; ?>
    <h1><?= Html::encode($category->name) ?></h1>
    <?= $category->description ?>
<?php else: ?>
    <div class="pull-left poster">
        <?= Html::a(Html::img(Category::SRC_IMAGE . '/' . $category->thumbnailImage, [
            'class' => 'img-responsive'
        ]), Category::SRC_IMAGE . '/' . $category->image, [
            'rel' => 'findImages'
        ]); ?>
    </div>
    <?php if (Yii::$app->user->can('manager')): ?>
        <?= Html::a(Yii::t('app', 'Edit'), ['manager/category-update', 'id' => $category->id], ['class' => 'btn btn-primary pull-right']) ?>
    <?php endif; ?>
    <h1><?= Html::encode($category->name) ?></h1>
    <?= $category->description ?>
<?php endif; ?>

<div class="clearfix"></div>

<?php if (!empty($category->finds)): ?>
    <h2><?= Yii::t('app', 'Collection') ?></h2>
    <div class="row collection">
        <?php foreach ($category->finds as $find): ?>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <a href="<?= Url::to(['find/view', 'id' => $find->id]) ?>" class="find-item">
                    <?php if (!empty($find->image)): ?>
                        <div class="row">
                            <?= Html::img(Find::SRC_IMAGE . '/' . $find->thumbnailImage, ['class' => 'img-responsive']) ?>
                        </div>
                    <?php endif; ?>
                    <h4>
                        <?= $find->name ?>
                    </h4>
                    <?= $find->annotation ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($category->publication)): ?>
    <h3><?= Yii::t('app', 'Publications') ?></h3>
    <?= $category->publication ?>
<?php endif; ?>
