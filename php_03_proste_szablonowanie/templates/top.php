<?php require_once dirname(__FILE__) .'/../config.php';?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php out($page_description); if (!isset($page_description)) {  ?> Szybkie pieniądze bez zbędnych formalności ... <?php } ?>">

    <title><?php out($page_title); if (!isset($page_title)) {  ?> Zadanie 3 - proste szablonowanie <?php } ?></title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->x
        <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/main-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/layouts/marketing.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/style.css">
<?php if ($hide_intro) { ?>
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/style_hide_intro.css">
<?php } ?>
	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<script src="<?php print(_APP_URL); ?>/js/jquery.min.js"></script>
	<script src="<?php print(_APP_URL); ?>/js/softscroll.js"></script>
</head>
<body>

<div id="app_top" class="header">
    <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href=""><?php out($page_title); if (!isset($page_title)) {  ?> Kalkulator kredytowy <?php } ?></a>
        <ul>
            <li class="pure-menu-selected"><a href="#app_top">Góra strony</a></li>
            <li><a href="#app_content">Idź do formularza</a></li>
        </ul>
    </div>
</div>

<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head"><?php out($page_header); if (!isset($page_header)) {  ?> Kalkulator kredytowy <?php } ?></h1>
        <p class="splash-subhead">
             <?php out($page_description); if (!isset($page_description)) {  ?> Szybkie pieniądze bez zbędnych formalności <?php } ?>
        </p>
        <p>
            <a href="#app_content" class="pure-button pure-button-primary">Idź do formularza</a>
        </p>
    </div>
</div>

<div class="content-wrapper">

    <div id="app_content" class="content">
