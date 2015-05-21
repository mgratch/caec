<?php
/**
 * The template for displaying all single posts.
 *
 * @package College Application Essay Coach
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main col-md-8" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php college_application_essay_coach_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>