<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\Find */

use common\models\FindImage;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Дополнительные изображения';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    ['label' => 'Коллекция', 'url' => ['/manager/find']],
    ['label' => $model->name, 'url' => ['/manager/find-update', 'id' => $model->id]],
    $this->title,
];

?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="clearfix">
    <?= Html::a('Назад', ['/manager/find-update', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
</div>

<br>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'fileImages[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>


<div class="clearfix"></div>

<?= GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        [
            'attribute' => 'image',
            'format' => 'html',
            'options' => ['style' => 'width: 100px;'],
            'value' => function ($model) {
                return empty($model->image) ? null : Html::img(FindImage::SRC_IMAGE . '/' . FindImage::THUMBNAIL_PREFIX . $model->image, ['class' => 'img-responsive img-thumbnail']);
            }
        ],
        [
            'attribute' => 'description',
            'format' => 'html',
        ],
        [
            'class' => 'backend\grid\ActionColumn',
            'options' => ['style' => 'width: 100px;'],
            'buttons' => [
                'view' => function ($url, $model) {
                    return \yii\helpers\Html::a(
                        '<span class="fas fa-eye"></span>',
                        FindImage::SRC_IMAGE . '/' . $model->image);
                },
                'update' => function ($url, $model) {
                    return \yii\helpers\Html::a(
                        '<span class="fas fa-edit"></span>',
                        ['manager/image-update', 'id' => $model->id]);
                },
                'delete' => function ($url, $model) {
                    return \yii\helpers\Html::a(
                        '<span class="fas fa-trash"></span>',
                        ['manager/image-delete', 'id' => $model->id],
                        [
                            'data-pjax' => "0",
                            'data-confirm' => "Вы уверены, что хотите удалить этот элемент?",
                            'data-method' => "post"
                        ]);
                }
            ],
        ],
    ],
]) ?>
