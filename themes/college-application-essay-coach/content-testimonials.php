<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package College Application Essay Coach
 */
?>
<?php $got_content = get_the_content(); ?>
<?php $got_content = strip_tags( $got_content ); $content_length = strlen( $got_content ); ?>
<?php 
 if ($content_length < 100 ){
     $font_size_class = 'fs-tiny';
 }
 elseif ($content_length > 100  && $content_length < 200 ){
     $font_size_class = 'fs-small';
 }
 elseif ($content_length > 200  && $content_length < 300 ){
     $font_size_class = 'fs-medium';
 }
 elseif ($content_length >300 && $content_length < 400){
     $font_size_class = 'fs-large';
 }
 elseif ($content_length > 400 && $content_length < 500){
     $font_size_class = 'fs-xlarge';
 }
 elseif ($content_length > 500){
     $font_size_class = 'fs-xxlarge';
 }  ?>
<aside id="post-<?php the_ID(); ?>" <?php post_class($font_size_class); ?>>
	<div class="testimonial-content">
        <?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'college-application-essay-coach' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'college-application-essay-coach' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</aside><!-- #post-## -->
