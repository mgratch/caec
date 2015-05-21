<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package College Application Essay Coach
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-md-4 blog-right-sidebar" role="complementary">
	<?php dynamic_sidebar( 'sidebar-4' ); ?>
</div><!-- #secondary -->
