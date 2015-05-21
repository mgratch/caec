<?php
/**
 * The template for displaying Author bios
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package College Application Essay Coach
 */
global $wp_query;
$curauth = $wp_query->get_queried_object();
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

        <div class="author-info">
            <div class="author-description">
                <?php $theAuthor = get_the_author(); ?>
                <h1 class="author-heading"><?php _e( "About <span class='author-title'>{$theAuthor}</span>", 'college-application-essay-coach' ); ?></h1>
                <div class="author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ),128 ); ?>
                </div><!-- .author-avatar -->

                <p class="author-bio">
                    <?php the_author_meta( 'description' ); ?>
                    <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                        <?php printf( __( 'View all posts by %s', 'college-application-essay-coach' ), get_the_author() ); ?>
                    </a>
                </p><!-- .author-bio -->
                <?php echo get_admin_edit_user_link($curauth->ID); ?>
            </div><!-- .author-description -->
        </div><!-- .author-info -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php
if ($is_active_sidebar === TRUE):
    get_sidebar();
endif;
?>

<?php get_footer(); ?>
