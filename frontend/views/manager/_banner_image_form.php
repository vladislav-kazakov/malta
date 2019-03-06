<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\BannerImage;

/* @var $this yii\web\View */
/* @var $model common\models\BannerImage */
/* @var $form ActiveForm */
?>
<div class="manager-_banner_image">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <?= $form->field($model, 'fileImage')->fileInput() ?>
            <?= $form->field($model, 'position')->textInput([
                'type' => 'number',
                'min' => 1,
            ]) ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <?php if (!empty($model->image)): ?>
                <?= Html::img(BannerImage::SRC_IMAGE . '/' . $model->thumbnailImage, ['class' => 'img-responsive']) ?>
            <?php endif; ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div><!-- manager-_banner_image -->
