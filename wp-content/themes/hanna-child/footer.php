<?php
/**
 * The template for showing our footer
 *
 * @package Hanna
 * @since Hanna 1.0
 */

$theme_options = get_theme_mod('zilla_theme_options');
?>

		<?php zilla_content_end(); ?>
		<!-- END #content .site-content-->
		</div>

		<?php get_sidebar('footer'); ?>

		<?php zilla_footer_before(); ?>
		<!-- BEGIN #footer -->
		<footer id="footer" class="site-footer" role="contentinfo">
		<?php zilla_footer_start(); ?>

			<div class="social">
	        <?php
	        if( isset($theme_options['facebook_url']) && $theme_options['facebook_url'] ){ echo '<a href="'. filter_var( $theme_options['facebook_url'], FILTER_SANITIZE_URL ) .'" class="facebook" title="Follow on Facebook">'; include( get_template_directory() .'/images/Facebook.svg' ); echo '</a>'; }
	        if( isset($theme_options['twitter_url']) && $theme_options['twitter_url'] ){ echo '<a href="'. filter_var( $theme_options['twitter_url'], FILTER_SANITIZE_URL ) .'" class="twitter" title="Follow on Twitter">'; include( get_template_directory() .'/images/Twitter.svg' ); echo '</a>'; }
	        if( isset($theme_options['pinterest_url']) && $theme_options['pinterest_url'] ){ echo '<a href="'. filter_var( $theme_options['pinterest_url'], FILTER_SANITIZE_URL ) .'" class="pinterest" title="Follow on Pinterest">'; include( get_template_directory() .'/images/Pinterest.svg' ); echo '</a>'; }
	        if( isset($theme_options['instagram_url']) && $theme_options['instagram_url'] ){ echo '<a href="'. filter_var( $theme_options['instagram_url'], FILTER_SANITIZE_URL ) .'" class="instagram" title="Follow on Instagram">'; include( get_template_directory() .'/images/Instagram.svg' ); echo '</a>'; }
	        if( isset($theme_options['linkedin_url']) && $theme_options['linkedin_url'] ){ echo '<a href="'. filter_var( $theme_options['linkedin_url'], FILTER_SANITIZE_URL ) .'" class="linkedin" title="View LinkedIn Profile">'; include( get_template_directory() .'/images/Linkedin.svg' ); echo '</a>'; }
	        ?>
			</div>

			<p><span class="copyright">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo( 'name' ); ?></a>.</span></p>

		<?php zilla_footer_end(); ?>
		<!-- END #footer -->
		</footer>
		<?php zilla_footer_after(); ?>

	<!-- END #container .hfeed .site -->
	</div>

	<!-- Theme Hook -->
	<?php zilla_body_end(); ?>
	<?php wp_footer(); ?>

<!--END body-->
</body>
<!--END html-->
</html>