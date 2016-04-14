<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corona
 */

if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
	return;
}
?>

<aside id="primary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-primary' ); ?>
</aside><!-- #secondary -->
