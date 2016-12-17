<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package bumpas
 */

get_header(); ?>

	<div class="content-area">
		<?php wp_nav_menu( array( 'theme_location' => 'work' ) ); ?>
		<main class="site-main flexit" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ 
			$args = array( 'post_type' => 'projects');
			$loop = new WP_Query( $args );
			
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php 
					$image = get_field('work_image');
					if( !empty($image) ): 
					// vars
					$title = $image['title'];
					$alt = $image['alt'];
					$caption = $image['caption'];
					// thumbnail
					$size = 'thumbnail';
					$thumb = $image['sizes'][ $size ];

				if( $caption ): ?>
				<div class="wp-caption">
					<?php endif; ?>
						<a href="<?php the_permalink(); ?>" title="<?php echo $title; ?>">
							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
						</a>
					<?php if( $caption ): ?>
				<p class="wp-caption-text"><?php echo $caption; ?></p>
				</div>
				<?php endif; ?>
				<?php endif; ?>
				<p><?php the_field('work_desc'); ?></p>
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