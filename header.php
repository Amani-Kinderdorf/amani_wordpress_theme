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
    <meta name="author" content="Amani Kinderdorf e.V." />
    <meta name="description" content="Der Verein Amani Kinderdorf e.V. baut und betreibt zwei Dörfer für bedürftige Kinder in der Region Iringa im Süden Tansanias und fördert ihre schulische und berufliche Bildung dieser Kinder." />
    <meta name="keywords" content="tansania, kilolo, kitwiru, amani, kinderdorf, tanzania, freiwilligendienst, Patenschaft, weltwärts" />

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/styles/mobile.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url')?>/font-awesome/css/font-awesome.min.css">
    
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
        <ul>
            <li>
                <a href="<?php echo home_url();?>" class="header-logo-container">
                    <span class="header-logo"></span>
                </a>
            </li>
        </ul>
        <nav id="nav">
            <a href="#nav" title="Menü einblenden"><i class="fa fa-bars fa-lg"></i></a>
            <a href="#" title="Menü ausblenden"><i class="fa fa-bars fa-lg"></i></a>
            <ul>
                <?php wp_nav_menu( array('menu' => 'mainMenu', 'container' => '','items_wrap' => '%3$s' )); ?>
            </ul>
        </nav>
        <section id="searchSection" class="inputHidden">
    <form id="searchForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input id="searchField" type="search" name="s" name="searchInput" onblur="changeVisibility(true)" onfocus="changeVisibility(false)">
        <span id="searchIcon" onclick="searchButtonClicked();"></span>
    </form>
    </section>
    </div>
</div>


<?php if (is_front_page()):?>
<header>
    <a class="logo-item" href="<?php echo home_url(); ?>">
        <img class="logo-image" src="<?php bloginfo('template_url')?>/img/logo.svg" alt="logo" onerror="this.src='<?php bloginfo('template_url')?>/img/logo_full.png'"/>
    </a>

    <h4 class="logo-description"><?php bloginfo('description'); ?></h4>
</header>
<?php  else:?>
<header style="margin-to:60px"></header>
<?php endif; ?> 

<?php if(WP_DEBUG==true): ?>
    <div class="test-overlay">Sie benutzen die Testumgebung der Amani-Kinderdorf Homepage. Bitte wechseln sie zur Hauptseite unter: <a href="https://www.amani-kinderdorf.de">www.amani-kinderdorf.de</a></div>
<?php endif; ?>
