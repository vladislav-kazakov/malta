<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\Type */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\News;
use mihaildev\ckeditor\CKEditor;

$this->title = 'Редактирование группы коллекции';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    ['label' => 'Группа коллекции', 'url' => ['/manager/type']],
    $this->title,
];

?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="clearfix">
    <?= Html::a('Просмотр', ['type/view', 'id' => $model->id]) ?>
    <div class="pull-right">
        <?= Html::a('Удалить', [
            'manager/type-delete',
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

<?= $this->render('_type_form', ['model' => $model]) ?>