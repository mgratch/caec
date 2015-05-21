<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package College Application Essay Coach
 */
$is_active_sidebar = is_active_sidebar( 'sidebar-4' );
if ($is_active_sidebar === TRUE){
    $main_width = 8;
}
else {
    $main_width = 12;
}
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main col-md-<?php echo intval($main_width); ?>" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ($is_active_sidebar === TRUE):
    get_sidebar();
endif;
?>

<?php get_footer(); ?>
