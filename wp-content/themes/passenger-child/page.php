<?php
/**
 * The default template for displaying pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Passenger
 */

get_header( 'custom' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="pagetitle">
  <div class="page hfeed site">
    <div id="main" class="site-main">
      <h1 class="page-title">
        <?php the_title(); ?>
      </h1>
      <span class="title-border"></span> </div>
  </div>
</div>
<?php endwhile; ?>
<?php rewind_posts(); ?>
<div class="page fullwidth hfeed site">
 <div class="innerpage">
  <div id="main" class="site-main">
    <div id="primary" class="content-area">
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
     <?php get_sidebar(); ?>
  </div>
  </div>
</div>
<?php get_footer(); ?>