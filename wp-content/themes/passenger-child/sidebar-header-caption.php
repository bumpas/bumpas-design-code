<?php
/**
 * The first widget area on the header image.
 *
 * @package Passenger
 */
?>
<?php if ( is_active_sidebar( 'sidebar-header-caption' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-header-caption' ); ?>
<?php endif; ?>