<?php

/* @var $this yii\web\View */

/* @var $type Type */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Type;
use common\models\Category;

$this->title = $type->name;

$this->params['breadcrumbs'] = [
    $this->title,
];

$this->registerCssFile('css/type.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
?>


<h1><?= Html::encode($type->name) ?></h1>

<?php if (Yii::$app->user->can('manager')): ?>
    <?= Html::a(Yii::t('app', 'Edit'), ['manager/type-update', 'id' => $type->id], ['class' => 'btn btn-primary pull-right']) ?>
<?php endif; ?>

<?= $type->annotation ?>

<?php if (!empty($type->categories)): ?>
    <h2><?= Yii::t('app', 'Categories') ?></h2>
    <div class="row">
        <?php foreach ($type->categories as $category): ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="<?= Url::to(['category/view', 'id' => $category->id]) ?>" class="category-item">
                    <?php if (!empty($category->image)): ?>
                        <div class="row">
                            <?= Html::img(Category::SRC_IMAGE . '/' . $category->thumbnailImage, ['class' => 'img-responsive']) ?>
                        </div>
                    <?php endif; ?>
                    <h3>
                        <?= $category->name ?>
                    </h3>
                    <?= $category->annotation ?>
                </a>
            </div>
        <?php endforeach; ?>

    </div>
<?php endif; ?>

<?php if (!empty($type->publication)): ?>
    <h3><?= Yii::t('app', 'Publications') ?></h3>
    <?= $type->publication ?>
<?php endif; ?>

