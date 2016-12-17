<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passenger
 */

get_header('custom'); ?>
    <div class="page hfeed site">
        <div id="main" class="site-main">
        <?php if(get_theme_mod('passenger_blog_layout') == 'sidebar-right') : ?>
            <div class="two_third alternative">
                <div id="primary" class="content-area">
                    <div id="content" role="main">

                    <?php if ( have_posts() ) : ?>

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'content-alternative', get_post_format() );
                            ?>

                        <?php endwhile; ?>

                        <?php passenger_content_nav( 'nav-below' ); ?>

                    <?php else : ?>

                        <?php get_template_part( 'no-results', 'index' ); ?>

                    <?php endif; ?>

                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
            <div class="one_third lastcolumn">
                <?php get_sidebar(); ?>
            </div>
            <?php else: ?>
                <div id="primary" class="content-area">
                    <div id="content" role="main">

                    <?php if ( have_posts() ) : ?>

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'content', get_post_format() );
                            ?>

                        <?php endwhile; ?>

                        <?php passenger_content_nav( 'nav-below' ); ?>

                    <?php else : ?>

                        <?php get_template_part( 'no-results', 'index' ); ?>

                    <?php endif; ?>

                    </div><!-- #content -->
                </div><!-- #primary -->
            <?php endif; ?>
        </div><!-- #main -->
    </div><!-- .page -->
<?php get_footer(); ?>