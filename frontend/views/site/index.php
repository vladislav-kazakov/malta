<?php

/* @var $this yii\web\View */


$this->registerCssFile('css/home.css?201902172259', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);

$this->title = Yii::$app->name;
?>

<?= $this->render('_banner', ['bannerImages' => $bannerImages]) ?>

<div class="row">
    <div class="col-xs-12">
        <p>
            <?= Yii::t('home', 'Mal’ta is a multi-layered geoarchaeological object of the Upper Paleolithic, it located on the left bank of the Belaya River, on the upper edge of Mal’ta village (Usolskiy District, Irkutsk Region).') ?>
        </p>
        <p>
            <?= Yii::t('home', 'The archaeological site was opened in 1928 by M. M. Gerasimov. In the period from 1928 to 1958 years, cyclical investigations continued, during which ten field seasons were conducted under the leader by M. M. Gerasimov. An excavation area included of 1,427 m2; at least 15 dwellings (semi-dwelling sheds, summer dwellings such as plague), children\'s burial with rich accompanying equipment, dump sites, work sites, an intermediate zone with a minimum number of finds, and it was defined as a settlement.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'Malta was perceived as a single-layer archaeological site, and was identified as a short-term hunting camp. The main inventory of the "classical" Mal’ta amounted to several thousand finds, of which more than 850 are unique products of human culture.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'The modern cycle of research of Mal’ta-site by specialists from the Irkutsk State University begins in 1981 under the leader G.I. Medvedev, and continues to the present. In the course of large-scale field work with the involvement of researchers of natural sciences, the results were obtained, which allowed locating as a complex geoarcheological multi-layered object, where 14 levels of deposits of cultural residues dating from 43,000 to 12,000 years BP were identified. “Classical” Mal’ta, dating back from 23,000 to 18,000 years ago, occupies a position of 8 and 9 lithology units in the modern geological section scale.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'The total number of artifacts recorded to date is more than 13,000 finds. Among the stone tools numerous blades, points, scrapers, prismatic nucleares. A variety of products from the antler, bones and ivory: rods, awl, needles, handle tools. Anthropomorphic and ornithomorphic sculptural images, plaques made from mammoth ivory, and personal ornamentation items (pendants, lines, beads, bracelets, tiaras) became especially famous in the World.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'Mal’ta, together with the Buret’ Paleolithic site, discovered in 1936 by A.P. Okladnikov, has a number of similar features in the production of stone and bone implements, as well as stylistically homogeneous anthropomorphic and ornithomorphic figurines, forms a specific Mal’ta-Buret’ archaeological culture.') ?>
        </p>
    </div>

    <div class="clearfix"></div>
    <br>
</div>
