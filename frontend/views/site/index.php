<?php

/* @var $this yii\web\View */


$this->registerCssFile('css/home.css?201903131429', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);

$this->title = Yii::$app->name;
?>

<?= $this->render('_banner', ['bannerImages' => $bannerImages]) ?>

<div class="row">
    <div class="col-xs-12">
        <p>
            <?= Yii::t('home', 'Mal’ta site is an Upper Paleolithic multilayer geoarchaeological object. It is situated on the left side of the river Belaya, near the Mal’ta village of Usolski district, Irkutsk region.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'The site was discovered in 1928 by M.M. Gerasimov. The research included ten field seasons and last during 1928-1958 under the direction of M.M. Gerasimov. The excavation area was 1427 square meters. It includes a complex of habitation sites consists of no less 15 dwellings, one child’s burial with rich inventory, landfill sites, work sites, an intermediate zone with a minimum of finds.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'Mal’ta considered as a single-layer site and was determined as a short-term hunter’s site. The basic inventory complex of “classic” Mal’ta contains several thousands of finds. Among them, 850 are unique items of prehistoric art.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'The modern stage of Mal’ta research started in 1981 under the direction of G.I. Medvedev and continues to this day. During the large field work with the involvement of natural sciences researchers, the scientists got the results that helps to determine the site as a complex geoarchaeological multilayer object with 14 levels of cultural deposits dates from 43 000 to 12 000. “Classic” Mal’ta collection dates from 23 000 to 18 000 and relates to 8 and 9 lithological units.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'General number of artefacts is more than 13 000 finds. Among the stone tools, there are many blades, tips, scrapers, prismatic blades. Also, the site gives us a huge variety of ivory, bone and antler items: rods, awls, needles and handles. There is also a collection of items that gained a particular fame. These are the anthropomorphic and zoomorphic figurines, ivory plates and rondelles and the items of personal ornament (pendants, beads, bracelets and diadems).') ?>
        </p>
        <p>
            <?= Yii::t('home', 'Mal’ta and Buret’ – the other paleolithic site – have a number of similar features in the manufacturing of stone and bone tools and stylistically similar anthropomorphic and zoomorphic figurines. Thus, they form a special Mal’ta-Buret’ culture.') ?>
        </p>
    </div>

    <div class="clearfix"></div>
    <br>
</div>
