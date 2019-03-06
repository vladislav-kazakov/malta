<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\Category */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\News;
use mihaildev\ckeditor\CKEditor;

$this->title = 'Редактирование категории';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    ['label' => 'Категории', 'url' => ['/manager/category']],
    $this->title,
];

?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="clearfix">
    <?= Html::a('Просмотр', ['category/view', 'id' => $model->id]) ?>
    <div class="pull-right">
        <?= Html::a('Удалить', [
            'manager/category-delete',
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

<?= $this->render('_category_form', [
    'model' => $model,
    'data' => $data,
]) ?>