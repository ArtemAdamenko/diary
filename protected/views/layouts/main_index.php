
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo CHtml::encode(Yii::app()->name); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <script type="text/javascript"
            src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/js.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/comment.js"></script>

</head>
<div id="container">
    <div id="main">
        <body class="main-page">
        <header class="air-bg">
            <nav class="head-navi">
                <?php echo CHtml::link("Программы обучения и цены", array("/site/programs")); ?>
                <?php echo CHtml::link("Новости", array("/news/")); ?>
                <?php echo CHtml::link("Фотогалерея", array("/gallery")); ?>
                <?php echo CHtml::link("Видеогалерея", array("/galleryVideo")); ?>
                <?php echo CHtml::link("Преподаватели", array("/site/teachers")); ?>
                <?php echo CHtml::link("О компании", array("/site/about")); ?>
                <?php echo CHtml::link("Дневник", array("/diary/default/login")); 
                ?>

            </nav>
            <?php echo $content; ?>
    </div>
</div>
<footer>
    <section>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/footer-logo.png">

        <div class="footer-text">
            <p>
                «ENGLISH ACCENT»
                <?php echo CHtml::link("Программы обучения и цены", array("site/programs")); ?>
                <?php echo CHtml::link("Новости", array("news/")); ?>
                <?php echo CHtml::link("Фотогалерея", array("gallery/index")); ?>
                <?php echo CHtml::link("О компании", array("site/about")); ?>
                <span>Разработка сайта:</span>
            </p>

            <p>
                +7 (3519) 47-69-49
                <?php echo CHtml::link('<span>Наш Youtube канал</span>', 'http://www.youtube.com/user/englishaccentmgn'); ?>
                <?php echo CHtml::link('Мы в контакте', 'http://vk.com/club34926067'); ?>

                <span class="vk soc"></span>
                <?php echo CHtml::link('<span class="different"></span>', 'http://diffy.ru/'); ?>
            </p>
        </div>
    </section>
</footer>
</body>
<div class="top" style="position: fixed;top: 50%;"></div>
</html>
