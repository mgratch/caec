<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage collegeapplicationessaycoach.com
 * @since College Application Essay Coach 1.0
 */

$thisCat = get_category(get_query_var('cat'),false);
$thisCatID = $thisCat->term_id;

if (function_exists('pods')){
    $mytax = pods( 'category' );
    $mytax->fetch( $thisCatID );
    $exclude_posts_from_child = $mytax->field('exclude_posts_from_child');
    if ($exclude_posts_from_child == 1){
        $id_to_pass = $thisCatID;
    }
    else{
        $id_to_pass = NULL;
    }
}
else {
    $id_to_pass = NULL;
}

$is_active_sidebar = is_active_sidebar( 'sidebar-4' );
if ($is_active_sidebar === TRUE){
    $main_width = 8;
}
else {
    $main_width = 12;
}
get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main col-md-<?php echo intval($main_width); ?>" role="main">

            <?php if ( have_posts() ) : ?>
                <header class="archive-header">
                    <h1 class="page-title">
                        <?php
                        if ( is_category() ) :
                            single_cat_title();

                        elseif ( is_tag() ) :
                            single_tag_title();

                        elseif ( is_home() ) :
                            _e( 'All News and Articles', 'college-application-essay-coach' );

                        elseif ( is_author() ) :
                            printf( __( 'Author: %s', 'college-application-essay-coach' ), '<span class="vcard">' . get_the_author() . '</span>' );

                        elseif ( is_day() ) :
                            printf( __( 'Day: %s', 'college-application-essay-coach' ), '<span>' . get_the_date() . '</span>' );

                        elseif ( is_month() ) :
                            printf( __( 'Month: %s', 'college-application-essay-coach' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'college-application-essay-coach' ) ) . '</span>' );

                        elseif ( is_year() ) :
                            printf( __( 'Year: %s', 'college-application-essay-coach' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'college-application-essay-coach' ) ) . '</span>' );

                        elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                            _e( 'Asides', 'college-application-essay-coach' );

                        elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                            _e( 'Galleries', 'college-application-essay-coach' );

                        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                            _e( 'Images', 'college-application-essay-coach' );

                        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                            _e( 'Videos', 'college-application-essay-coach' );

                        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                            _e( 'Quotes', 'college-application-essay-coach' );

                        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                            _e( 'Links', 'college-application-essay-coach' );

                        elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                            _e( 'Statuses', 'college-application-essay-coach' );

                        elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                            _e( 'Audios', 'college-application-essay-coach' );

                        elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                            _e( 'Chats', 'college-application-essay-coach' );

                        else :
                            _e( 'Archives', 'college-application-essay-coach' );

                        endif;
                        ?>
                    </h1>
                    <?php if ( category_description() ) : // Show an optional category description ?>
                        <div class="archive-meta"><?php echo category_description(); ?></div>
                    <?php endif; ?>
                </header><!-- .archive-header -->


                <?php if ($id_to_pass != NULL): ?>
                    <?php

                    // WP_Query arguments
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array (
                        'category__in'           => "{$id_to_pass}",
                        'paged'                  => $paged
                    );

                    // The Query
                    $wp_query = new WP_Query( $args );

                    // The Loop ?>

                    <?php while ( $wp_query->have_posts() ): $wp_query->the_post(); ?>
                        <?php get_template_part( 'content', 'category' ); ?>
                    <?php endwhile; ?>

                    <?php // Restore original Post Data ?>
                    <?php rewind_posts(); ?>
                <?php else: ?>

                    <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', 'category' ); ?>

                    <?php endwhile; ?>
                <?php endif; ?>

                <?php college_application_essay_coach_paging_nav(); ?>

            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>

        </main><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>