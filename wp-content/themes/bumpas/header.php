<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="site-content">
 *
 * @package bumpas
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
	<header class="site-header" role="banner">
		<div class="img-wrap"></div>
		<div class="site-branding">
			<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		<a class="instagram" href="http://instagram.com/bumpas" title="Follow me on Instagram"><img src="<?php bloginfo('template_url');?>/images/icon-instagram.png" alt="instagram icon" /></a>
	</header><!-- #masthead -->
<div class="site">
	<div class="site-content row">