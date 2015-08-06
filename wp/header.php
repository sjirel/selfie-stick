<?php
/*
	=================================================
	Selfiestick - Default Header Template
	=================================================
*/
?>
<!doctype html>
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="author" content="Minisuit | www.selfiestick.photography">
<!-- Enable if site is optimized for mobile devices -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
<!-- Favicons
================================================== -->
    <link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo( 'template_url' ); ?>/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo( 'template_url' ); ?>/images/apple-touch-icon-114x114.png">

    <!-- Versioning enabled for caching -->
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <!-- Flexslider Css -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/lib/css/flexslider.css">

    <!-- Including fonts from Google-->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

	<?php // JavaScript added through functions.php to avoid conflicts ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php dynamicBody(); ?>>
<div class="container">
    <header id="header">
        <div class="wrapper group">
            <h1 id="logo" class="col">
                <a href="<?php echo home_url( '/' ); ?>">
                    <img src="<?php echo get_option( 'client_logo_url' ); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
                </a>
            </h1>
            <span class="menu-trigger">Menu</span>
            <nav id="main-nav" class="alignright">
                <?php h5bs_primary_nav(); ?>
            </nav>
        </div>

    </header>
