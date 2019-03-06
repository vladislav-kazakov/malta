<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Группы коллекции';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    $this->title,
];
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="clearfix">
    <div class="pull-right">
        <?= Html::a('Добавить группу коллекции', ['manager/type-create'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<br>

<?php if (!empty($types)): ?>
    <table class="table table-responsive table-hover">
        <thead>
        <tr>
            <th>№</th>
            <th>Название</th>
            <th></th>
        </tr>
        </thead>
        <?php /** @var \common\models\Type $item */
        foreach ($types as $i => $item): ?>
            <tr>
                <td>
                    <?= ($i + 1) ?>
                <td>
                    <?= $item->name ?>
                </td>
                </td>
                <td>
                    <?= Html::a('Перейти', ['manager/type-update', 'id' => $item->id], ['class' => 'btn btn-primary']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
