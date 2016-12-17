<?php
/**
 * @package bumpas
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<div class="col-5-1">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<p class="subtitle"><?php the_field('caption'); ?></p>
			<?php the_excerpt(); ?>
		</header><!-- .entry-header -->
	</div>
	<div class="entry-thumb col-7-6">
		<?php if ( has_post_thumbnail()) : ?>
   			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
   				<?php the_post_thumbnail('blog-thumb', array('class' => 'aligncenter')); ?>
   			</a>
 		<?php endif; ?>
	</div><!-- .entry-thumb -->
</article><!-- #post-## -->
