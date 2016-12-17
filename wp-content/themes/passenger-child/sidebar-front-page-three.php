<?php
/**
 * The second widget area on the front page template.
 *
 * @package Passenger
 */
?>
<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
<hr class="carved one" />
<div class="clear widget-area" role="complementary">
	<div class="<?php passenger_widget_counter( 'sidebar-5' ); ?>">
		<?php dynamic_sidebar( 'sidebar-5' ); ?>
	</div>
</div>
<?php endif; ?>