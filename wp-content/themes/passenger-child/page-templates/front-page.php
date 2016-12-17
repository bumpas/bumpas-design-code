<?php
/**
 * Template Name: Front Page
 *
 * @package Passenger
 */

get_header(); ?>

<div class="page hfeed site">
  <div id="main" class="site-main">
  <div id="primary" class="content-area single">
  <div id="content" class="site-content front-page" role="main">
    <?php get_sidebar( 'front-page-one' ); ?>
    <?php get_sidebar( 'front-page-three' ); ?>
    <?php get_sidebar( 'front-page-two' ); ?>
    </div></div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>