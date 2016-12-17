<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Passenger
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<!-- Favicons ==================================================
================================================== -->
<?php if(get_theme_mod('passenger_favicon')) : ?>
<link rel="shortcut icon" href="<?php echo get_theme_mod( 'passenger_favicon' ); ?>">
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>
<header id="masthead" class="site-header" role="banner">
  <div class="page hfeed site">
    <nav id="site-navigation" class="navigation-main" role="navigation">
      <h1 class="menu-toggle anarielgenericon">
        <?php _e( 'Menu', 'passenger' ); ?>
      </h1>
      <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'passenger' ); ?>">
        <?php _e( 'Skip to content', 'passenger' ); ?>
        </a></div>
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
  </div>
  <div class="single-image">
    <?php //if ( has_post_thumbnail() && ! is_front_page() && ! is_home()): {
      //$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
    //} ?>
      <!--<div class="header section" style="background-image: url(<?php //echo $thumbnail[0]; ?>);">-->
        <?php //get_sidebar( 'header-caption' ); ?>
      <!-- </div> -->
   
    <?php //else: ?>

    <div class="header section" style="background-image: url(<?php if (get_header_image() != '') : ?><?php header_image(); ?><?php else : ?><?php echo get_template_directory_uri() . '/images/header.jpg'; ?><?php endif; ?>);">
      <?php get_sidebar( 'header-caption' ); ?>
    </div>

    <?php //endif; ?>
  </div>
</header>
<!-- #masthead -->