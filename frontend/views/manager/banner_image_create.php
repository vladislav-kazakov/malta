<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\Find */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\News;
use mihaildev\ckeditor\CKEditor;

$this->title = 'Добавление изображение';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    ['label' => 'Изображения баннера', 'url' => ['/manager/banner-image']],
    $this->title,
];

?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_banner_image_form', [
    'model' => $model,
]) ?>