<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Passenger
 */

get_header( 'custom' ); ?>
<div class="page hfeed site">
    <div id="main" class="site-main singleblog">
        <div id="primary" class="content-area single">
            <div id="content" class="site-content" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'single' ); ?>

                <?php passenger_content_nav( 'nav-below' ); ?>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>

            <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>