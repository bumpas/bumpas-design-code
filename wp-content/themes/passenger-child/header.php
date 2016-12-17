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
    <nav id="site-navigation" class="navigation-main" role="navigation">
      <h1 class="menu-toggle anarielgenericon">
        <?php _e( 'Menu', 'passenger' ); ?>
      </h1>
      <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'passenger' ); ?>">
        <?php _e( 'Skip to content', 'passenger' ); ?>
        </a></div>
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
   <?php $header_image = get_header_image();
    if ( ! empty( $header_image ) ) : ?>
<div class="header-cover">
  <div class="header section" style="background-image: url(<?php if (get_header_image() != '') : ?><?php header_image(); ?><?php else : ?><?php echo get_site_url() . '/images/header.jpg'; ?><?php endif; ?>);">
    <?php get_sidebar( 'header-caption' ); ?>
  </div>
<?php endif; ?>
    
  </div>
</header>
<!-- #masthead -->