<?php
/**
 * @package bumpas
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php base_portfolio_meta( $post->ID ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		$portfolio_custom_fields = array();
		$portfolio_custom_fields['display_gallery'] = get_post_meta( $post->ID, '_tzp_display_gallery', true );
		$portfolio_custom_fields['display_audio'] = get_post_meta( $post->ID, '_tzp_display_audio', true );
		$portfolio_custom_fields['display_video'] = get_post_meta( $post->ID, '_tzp_display_video', true );
		?>
		<?php base_the_content(); ?>

		<?php base_portfolio_media($post->ID, $portfolio_custom_fields); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bumpas' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
