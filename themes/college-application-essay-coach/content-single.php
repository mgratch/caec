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
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
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

		        <?php
			        /* translators: used between list items, there is a space after the comma */
			        $category_list = get_the_category_list( __( ', ', 'college-application-essay-coach' ) );

			        /* translators: used between list items, there is a space after the comma */
			        $tag_list = get_the_tag_list( '', __( ', ', 'college-application-essay-coach' ) );

			        if ( ! college_application_essay_coach_categorized_blog() ) {
				        // This blog only has 1 category so we just need to worry about tags in the meta text
				        if ( '' != $tag_list ) {
					        $meta_text = __( ' tagged <span class="cat-links"><i class="fa fa-tag"></i> <span class="tags">%2$s.</span></span> Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'college-application-essay-coach' );
				        } else {
					        $meta_text = __( ' Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'college-application-essay-coach' );
				        }

			        } else {
				        // But this blog has loads of categories so we should probably display them here
				        if ( '' != $tag_list ) {
					        $meta_text = __( ' posted in <span class="cat-links"><i class="fa fa-tag"></i> <span class="tags">%1$s</span></span> and tagged <span class="cat-links"><i class="fa fa-tag"></i> <span class="tags">%2$s.</span></span> Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'college-application-essay-coach' );
				        } else {
					        $meta_text = __( ' posted in <span class="cat-links"><i class="fa fa-tag"></i> <span class="tags">%1$s</span></span>. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'college-application-essay-coach' );
				        }

			        } // end check for categories on this blog

			        echo college_application_essay_coach_posted_on();
			        printf(
				        $meta_text,
				        $category_list,
				        $tag_list,
				        get_permalink()
			        );
		        ?>
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
		<?php edit_post_link( __( 'Edit', 'college-application-essay-coach' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
