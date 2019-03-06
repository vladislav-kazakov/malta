<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form ActiveForm */
?>
<div class="manager-_category_form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-xs-6">
            <?= $form->field($model, 'type_id')->dropDownList($data) ?>
        </div>

        <div class="clearfix"></div>

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
            <?= $form->field($model, 'description')->widget(CKEditor::className(),
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
            <?= $form->field($model, 'description_en')->widget(CKEditor::className(),
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

        <div class="clearfix"></div>

        <div class="col-xs-6">
            <?= $form->field($model, 'fileImage')->fileInput() ?>
        </div>
        <?php if (isset($model->id) and !empty($model->id)): ?>
            <div class="col-xs-6">
                <?= Html::img(Category::SRC_IMAGE . '/' . $model->thumbnailImage, ['class' => 'img-responsive']) ?>
                <br>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- manager-_category_form -->