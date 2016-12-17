<?php
/**
 * * The web portfolio_type template
 *
 * @package bumpas
 */
get_header(); ?>
	<div class="content-area">
		<?php wp_nav_menu( array( 'theme_location' => 'work' ) ); ?>
		<main class="site-main flexit" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<?php if ( has_post_thumbnail() ) : ?>
					<a class="imgzoom" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('thumbnail'); ?>
					</a>
				<?php endif; ?>
				<p><?php the_excerpt(); ?></p>
			</article> <!-- #post -->
			<?php endwhile; ?>
			<?php bumpas_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
