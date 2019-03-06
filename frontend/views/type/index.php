<?php

/* @var $this yii\web\View */

/* @var $type \common\models\Category */

use yii\helpers\Html;
use common\models\Category;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Types');

$this->params['breadcrumbs'] = [
    $this->title,
];

$this->registerCssFile('css/type.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($types)): ?>
    <div class="list-group">
        <?php foreach ($types as $type): ?>
            <a class="list-group-item type" href="<?= Url::to(['type/view', 'id' => $type->id]) ?>" id="type-<?= $type->id ?>">
                <?= $type->name ?>
                <span class="badge"><?= Yii::t('app', 'number of categories {n}', ['n' => count($type->categories)])?></span>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>