<?php
/**
 * @package Passenger
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( has_post_thumbnail() ): ?>

  <a href="<?php the_permalink(); ?>">
  <?php the_post_thumbnail(); ?>
  </a>
  <?php endif; ?>
  <div class="postdate single">
    <?php
				if ( 'post' == get_post_type() )
					passenger_posted_on();
			?>
  </div>
  <header class="entry-header">
    <h1 class="entry-title">
     <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
    </h1>
  </header>
  <!-- .entry-header -->

  <div class="entry-content">
    <?php the_excerpt(); ?>
    <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'passenger' ),
				'after'  => '</div>',
			) );
		?>
  </div>
  <!-- .entry-content -->

  <footer class="entry-footer">
    <?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'passenger' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'passenger' ) );

			if ( ! passenger_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'passenger' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'passenger' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'passenger' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'passenger' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>
    <?php edit_post_link( __( 'Edit', 'passenger' ), '<span class="edit-link">', '</span>' ); ?>
  </footer>
  <!-- .entry-footer -->
 <hr class="carved" />
</article>
<!-- #post-## -->