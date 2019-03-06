<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\Category */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\News;
use mihaildev\ckeditor\CKEditor;

$this->title = 'Добавление категории';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    ['label' => 'Категории', 'url' => ['/manager/category']],
    $this->title,
];
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_category_form', [
    'model' => $model,
    'data' => $data,
]) ?>
