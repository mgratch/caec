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
$myprocess_titles = get_option('lwi_myprocess_settings_archive_title');
get_header(); ?>

	<div id="primary" class="content-area">
        <main id="main" class="site-main col-md-12" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
            <?php //Restore original Post Data ?>
            <?php wp_reset_postdata(); ?>

            <?php

            // WP_Query arguments
            $args = array (
	            'post_type'              => 'lwi_service',
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
                <div class="row services">
	                <?php while ( $lwi_services->have_posts() ): $lwi_services->the_post(); ?>			
                            <?php get_template_part( 'content', 'services-front-page' ); ?>
	                <?php endwhile; ?>
                </div>
            <?php

            else:
	            // no posts found
            endif;

            // Restore original Post Data
            wp_reset_postdata();

            ?>

            <?php

            // WP_Query arguments
            $args = array (
	            'post_type'              => 'lwi_my_process',
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
            $lwi_my_process = new WP_Query( $args );

            // The Loop
            if ( $lwi_my_process->have_posts() ): ?>

                <div id="myProcessAccordion" class="col-md-12">  
                    <!-- Accordion -->
                    <h3><?php echo $myprocess_titles; ?></h3>
                    <div class="accordion" id="accordion2">
                        <?php while ( $lwi_my_process->have_posts() ): $lwi_my_process->the_post(); ?>
                        <?php $counter++ ; if ($counter === 1){
                            $collapse_class = ' in';
                        }
                        else {
                            $collapse_class = '';
                        }?>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse-<?php echo intval($counter); ?>">
                                <?php the_title(); ?>
                                </a>
                                <?php edit_post_link( __( 'Edit', 'college-application-essay-coach' ), '<span class="edit-link alignright">', '</span>' ); ?>
                            </div>
                            <div id="collapse-<?php echo intval($counter); ?>" class="accordion-body collapse<?php echo $collapse_class; ?>">
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
