<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the .site-content div and all content after
 *
 * @package bumpas
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'bumpas_credits' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'bumpas' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'bumpas' ), 'bumpas', '<a href="http://andrewbumpas.com" rel="designer">bumpas</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- .site -->
<?php wp_footer(); ?>

</body>
</html>