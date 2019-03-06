<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\BannerImage;

$this->title = 'Изображения баннера';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    $this->title,
];
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="clearfix">
    <div class="pull-right">
        <?= Html::a('Добавить изображение', ['manager/banner-image-create'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<br>

<?php if (!empty($bannerImages)): ?>
    <table class="table table-responsive table-hover">
        <thead>
        <tr>
            <th>№</th>
            <th>Название</th>
            <th></th>
        </tr>
        </thead>
        <?php /** @var \common\models\Find $item */
        foreach ($bannerImages as $i => $item): ?>
            <tr>
                <td>
                    <?= ($i + 1) ?>
                <td>
                    <?= Html::img(BannerImage::SRC_IMAGE . '/' . $item->thumbnailImage, ['class' => 'img-responsive']) ?>
                </td>
                <td>
                    <?= Html::a('Перейти', ['manager/banner-image-update', 'id' => $item->id], ['class' => 'btn btn-primary']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
