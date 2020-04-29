<?php

/* @var $this yii\web\View */


$this->registerCssFile('css/home.css?201903131429', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);

$this->title = Yii::$app->name;
?>

<?= $this->render('_banner', ['bannerImages' => $bannerImages]) ?>

<div class="row">
    <div class="col-xs-12">
        <p>
            <?= Yii::t('home', 'Buret’ site was discovered in the Nizhnaya Buret’ village which is on the Angara river. According to the data of 1940, the site was found in sediments of the second floodplain terrace (18-20 m high).') ?>
        </p>
        <p>
            <?= Yii::t('home', 'Buret’ site was discovered in 1936 by the Irkutsk museum expedition under the direction of Okladnikov A.P. The excavation started in the same year and last until 1940. The modern research of Buret’ are held by Irkutsk State University archaeologists and SSC “Baikal region”. The Buret’ collection includes near 500 items that are kept in the Museum of anthropology MSU, State Historical museum and in Irkutsk Art museum.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'Okladnikov A.P. discovered four dwellings of various configurations with the unique floor mounts made of antler, pillars of mammoth thigh-bones, wall mounts of limestone blocks and rhino skulls. Stone tools are close to the Mal’ta complex in technological characteristics. These are: tips, scrapers on blades, burins, side-scrapers, prismatic cores and blades, choppers (quartzite). The items made of bone, antler and ivory include rods, awls, borers, ivory hook, sculpture (17 pcs). Buret’ collection has the items which gained a great popularity. These are anthropomorphic and zoomorphic figurines, and also the items of personal ornamentation (beads, pendants, discs with holes).') ?>
        </p>
        <p>
            <?= Yii::t('home', 'The Buret’ inventory complex has a number of similar features in the manufacturing of stone and bone tools, as well as stylistically homogeneous sculptures with the complex of “classical” Malta. Thus, Buret’ collection is one of the main component of the specific Mal’ta-Buret’ culture.') ?>
        </p>
    </div>

    <div class="clearfix"></div>
    <br>
</div>
