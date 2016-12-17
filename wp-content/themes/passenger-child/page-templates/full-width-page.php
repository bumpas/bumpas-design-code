<?php
/**
 * Template Name: Full Width Page
 *
 * @package Passenger
 */

get_header( 'custom' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="pagetitle">
  <div class="page fullwidth hfeed site">
    <div id="main" class="site-main">
      <h1 class="page-title">
        <?php the_title(); ?>
      </h1>
      <span class="title-border"></span>
      </div>
  </div>
</div>
<?php endwhile; ?>
<?php rewind_posts(); ?>
<div class="page fullwidth hfeed site">
<div class="innerpage">
  <div id="main" class="site-main">
    <div id="primary" class="content-area full-width">
      <div id="content" class="site-content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page' ); ?>
        <?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>
        <?php endwhile; // end of the loop. ?>
      </div>
      <!-- #content -->
    </div>
    <!-- #primary -->
  </div>
 </div>
</div>
<?php get_footer(); ?>