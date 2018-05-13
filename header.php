<?php
/**
 * @package WordPress
 * @subpackage Taidevalimo
 * @since Taidevalimo 1.0
 */
?><!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Always force latest IE rendering engine (even in intranet) -->
  <!--[if IE ]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->

  <?php
    if (is_search())
      echo '<meta name="robots" content="noindex, nofollow" />';
  ?>

  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">

  <!--Google will often use this as its description of your page/site. Make it good.-->
  <meta name="description" content="<?php
    if (is_singular()) {
      single_post_title('', true);
    } else {
      bloginfo('description');
    } ?>"/>

  <?php
    if (true == of_get_option('meta_author'))
      echo '<meta name="author" content="' . of_get_option("meta_author") . '" />';

    if (true == of_get_option('meta_google'))
      echo '<meta name="google-site-verification" content="' . of_get_option("meta_google") . '" />';
  ?>

  <meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">

  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="https://use.typekit.net/bay1uje.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <?php
    $pageID = get_the_id();
    $url = wp_get_attachment_url(get_post_thumbnail_id($pageID));
  ?>

  <div id="wrapper" class="page-wrapper">
    <?php if (is_front_page()) { ?>
      <div class="site-background-image" style="background-image: url(<?php //echo $url; ?>)"></div>
    <?php } ?>

    <header id="header" role="banner">
      <h1 class="page-title">
        <a class="page-title-link padding-large padding-keep-left" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
          <i class="page-title-logo">
            <?php echo file_get_contents(get_stylesheet_directory_uri() . "/assets/img/tekstilogo_valimo_v2.svg"); ?>
          </i>
        </a>
      </h1>
      <button class="button menu-toggle-open padding-small padding-keep-right">
        <i class="material-icons open">menu</i>
      </button>
    </header>

    <div class="nav-background"></div>
    <button class="button menu-toggle-closed">
      <i class="material-icons close">close</i>
    </button>
    <div class="nav-container">
      <div class="nav-container-graphic padding-large">
        <i class="logopuu">
          <?php echo file_get_contents(get_stylesheet_directory_uri() . "/assets/img/logopuu_v5.svg"); ?>
        </i>
      </div>
      <nav id="nav" role="navigation">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'primary',
              'menu_class' => 'main-theme-menu padding-large padding-clear-bottom',
              'container_class' => 'main-theme-menu-container'
            )
          );
        ?>
      </nav>
    </div>
