<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Type */
/* @var $form ActiveForm */
?>
<div class="manager-_type_form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'name_en')->textInput() ?>
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-6">
            <?= $form->field($model, 'annotation')->widget(CKEditor::className(),
                [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                    'options' => [
                        'allowedContent' => true,
                    ],

                ]) ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'annotation_en')->widget(CKEditor::className(),
                [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                    'options' => [
                        'allowedContent' => true,
                    ],

                ]) ?>
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-6">
            <?= $form->field($model, 'publication')->widget(CKEditor::className(),
                [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                    'options' => [
                        'allowedContent' => true,
                    ],

                ]) ?>
        </div>

        <div class="col-xs-6">
            <?= $form->field($model, 'publication_en')->widget(CKEditor::className(),
                [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                    'options' => [
                        'allowedContent' => true,
                    ],

                ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- manager-_type_form -->