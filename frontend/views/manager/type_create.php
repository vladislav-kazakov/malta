<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\Type */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\News;
use mihaildev\ckeditor\CKEditor;

$this->title = 'Добавление группы коллекции';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    ['label' => 'Группы коллекции', 'url' => ['/manager/type']],
    $this->title,
];

?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_type_form', ['model' => $model]) ?>