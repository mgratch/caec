<?php
/**
 * @package College Application Essay Coach
 */
$post_id = get_the_ID();
$key = "hide_meta";
$hide_meta = get_post_meta( $post_id, $key, true );
if ($hide_meta){
	$hideMetaClass = " hideMe";
}
else {
	$hideMetaClass = "";
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php the_post_thumbnail( 'full' ); ?> 
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
        <?php echo lwi_custom_continue_reading_link(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'college-application-essay-coach' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer post-info-container<?php echo $hideMetaClass; ?>">
        <div class="row">
			<div class="col-md-10 entry-meta<?php echo $hideMetaClass; ?>">
                <div class="post-info">

			        <?php college_application_essay_coach_posted_on(); ?>

		    <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			    <?php
				    /* translators: used between list items, there is a space after the comma */
				    $categories_list = get_the_category_list( __( ', ', 'college-application-essay-coach' ) );
				    if ( $categories_list && college_application_essay_coach_categorized_blog() ) :
			    ?>
			    <span class="cat-links">
                    <i class="fa fa-tag"></i> 
                    <span class="tags">
				        <?php printf( __( 'Posted in %1$s', 'college-application-essay-coach' ), $categories_list ); ?>
                    </span>
			    </span>
			    <?php endif; // End if categories ?>

			    <?php
				    /* translators: used between list items, there is a space after the comma */
				    $tags_list = get_the_tag_list( '', __( ', ', 'college-application-essay-coach' ) );
				    if ( $tags_list ) :
			    ?>
			    <span class="tags-links">
                    <i class="fa fa-tag"></i> 
                    <span class="tags">
				        <?php printf( __( 'Tagged %1$s', 'college-application-essay-coach' ), $tags_list ); ?>
			        </span>
                </span>
			    <?php endif; // End if $tags_list ?>
            </div>
        </div>
                <?php if ( function_exists( 'sharing_display' ) ): ?>
                    <div class="col-md-2">
                        <div class="social-2 f-right">
                            <?php echo sharing_display(); ?>
                        </div>  
                    </div>
                <?php endif; ?>
        </div>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'college-application-essay-coach' ), __( '1 Comment', 'college-application-essay-coach' ), __( '% Comments', 'college-application-essay-coach' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'college-application-essay-coach' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->