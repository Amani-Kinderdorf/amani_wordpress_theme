<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Suche'; }
        elseif ( is_404() ) { bloginfo('name'); print ' | Seite nicht gefunden'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>

    <!-- blocks full scale -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="initial-scale=1">

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/styles/styles.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/styles/mobile.css" />

    <!-- change before upload -->
    <!-- change before upload -->
    <!-- change before upload -->
    <!-- change before upload -->
    <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/amani/font-awesome/css/font-awesome.min.css">
    <!-- change before upload -->
    <!-- change before upload -->
    <!-- change before upload -->
    <!-- change before upload -->
    
    <?php if(is_front_page()||is_home()): ?>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/styles/slick.css"/>
    <?php endif; ?>

    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'hbd-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'hbd-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url')?>/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url')?>/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url')?>/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url')?>/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url')?>/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url')?>/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url')?>/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url')?>/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url')?>/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_url')?>/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url')?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url')?>/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url')?>/img/favicons/favicon-16x16.png">

    <?php wp_head(); ?>
</head>
<body>

<div class="stickyHeader">
    <div class="contentWrapper">
        <a href="<?php echo home_url();?>"><img src="<?php bloginfo('template_url') ?>/img/hand_weiß.png"/></a>
        <nav id="nav">
            <a href="#nav" title="Menü einblenden"><i class="fa fa-bars fa-2x"></i></a>
            <a href="#" title="Menü ausblenden"><i class="fa fa-bars fa-2x"></i></a>
            <ul>
                <?php wp_nav_menu( array('menu' => 'mainMenu', 'container' => '','items_wrap' => '%3$s' )); ?>
            </ul>
            <!--<span class="align-right" onclick="$('body, html').animate({scrollTop:0},300);">⇧</span>-->
        </nav>
        <section id="searchSection" class="inputHidden">
    <form id="searchForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input id="searchField" type="search" name="s" name="searchInput" onblur="changeVisibility(true)" onfocus="changeVisibility(false)">
        <img id="searchIcon" src="<?php bloginfo('template_url') ?>/img/search.png" onclick="searchButtonClicked();"/>
    </form>
    </section>
    </div>
</div>


<?php if (is_front_page()):?>
<header>
    <a class="logoItem" href="<?php echo home_url(); ?>">
        <img class="logoImage" src="<?php bloginfo('template_url')?>/img/logo.png" alt="logo"/>
    </a>
    <div class="logoItem">
        <h2 class="logoText"><a href="<?php echo home_url(); ?>">AMANI<br/>KINDERDORF e.V.</a></h2>
    </div>
    <h4 class="logoDescription"><?php bloginfo('description'); ?></h4>
</header>
<?php  else:?>
<header style="margin-to:60px"></header>
<?php endif; ?> 

