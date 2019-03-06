<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\Find */

use yii\helpers\Html;

$this->title = 'Редактирование находки';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    ['label' => 'Коллекция', 'url' => ['/manager/find']],
    $this->title,
];

?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="clearfix">
    <?= Html::a('Просмотр', ['find/view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Дополнительные изображения', ['manager/find-image', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <div class="pull-right">
        <?= Html::a('Удалить', [
            'manager/find-delete',
            'id' => $model->id
        ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
</div>

<br>

<?= $this->render('_find_form', [
    'model' => $model,
    'data' => $data,
]) ?>
