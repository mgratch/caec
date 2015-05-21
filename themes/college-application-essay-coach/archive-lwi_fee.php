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
$counter = 0;
$fee_title = get_option('lwi_fees_settings_archive_title');
get_header(); ?>

	<div id="primary" class="content-area fees">
		<main id="main" class="site-main" role="main">

            <?php

            // WP_Query arguments
            $args = array (
	            'post_type'              => 'lwi_fee',
	            'post_status'            => 'published',
	            'pagination'             => false,
	            'posts_per_page'         => '-1',
	            'ignore_sticky_posts'    => false,
	            'orderby'                => 'menu_order',
                'no_found_rows'          => false,
                'Update_post_term_cache' => false,
                'Update_Post_meta_cache' => false
            );

            // The Query
            $lwi_services = new WP_Query( $args );

            // The Loop
            if ( $lwi_services->have_posts() ): ?>
            <div class="col-md-12">
                <h1><?php echo $fee_title; ?></h1>
                <div class="accordion" id="accordion2">

                <!-- Tabs -->
                <div class="tabbable">
                    <ul class="nav nav-tabs">
	                <?php while ( $lwi_services->have_posts() ): $lwi_services->the_post(); ?>
                    <?php $counter++ ; ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse-<?php echo intval($counter); ?>">
                            <h2>
                                <?php the_title(); ?>
                                <?php edit_post_link( __( 'Edit', 'college-application-essay-coach' ), '<span class="edit-link">', '</span>' ); ?>
                            </h2>
                            </a>
                        </div>
                        <div id="collapse-<?php echo intval($counter); ?>" class="accordion-body collapse in">
                            <div class="accordion-inner">
                            <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
	                <?php endwhile; ?>

        </div>   
        <!-- Accordion End -->  
        <div class="space40"></div>  
      </div>  
    </div>
        <?php

        else:
	        // no posts found
        endif;

        // Restore original Post Data
        wp_reset_postdata();

        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>