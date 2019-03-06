<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\Find */

use yii\helpers\Html;

$this->title = 'Редактирование изображения';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    ['label' => 'Изображения баннера', 'url' => ['/manager/banner-image']],
    $this->title,
];

?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="clearfix">
    <div class="pull-right">
        <?= Html::a('Удалить', [
            'manager/banner-image-delete',
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

<?= $this->render('_banner_image_form', [
    'model' => $model,
]) ?>
