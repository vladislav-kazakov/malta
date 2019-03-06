<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Управление контентом';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<ul class="list-group">
    <li class="list-group-item">
        <?= Html::a('Группа коллекции', ['manager/type']) ?>
    </li>
    <li class="list-group-item">
        <?= Html::a('Категории', ['manager/category']) ?>
    </li>
    <li class="list-group-item">
        <?= Html::a('Коллекция', ['manager/find']) ?>
    </li>
    <li class="list-group-item">
        <?= Html::a('Изображения на баннер', ['manager/banner-image']) ?>
    </li>
</ul>
