<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package College Application Essay Coach
 */
 if (is_front_page() === TRUE){
     $currClass = 'home-content';
	 $heading = "h2";
 }
 else {
     $currClass = '';
	 $heading = "h1";
 }

$post_id = get_the_ID();
$key = "hide_page_meta";
$hide_meta = get_post_meta( $post_id, $key, true );
if ($hide_meta){
	$hideMetaClass = " hideMe";
}
else {
	$hideMetaClass = "";
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($currClass); ?>>
	<header class="entry-header">
		<?php the_title( "<{$heading} class='entry-title'>", "</{$heading}>" ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
        <?php if ( has_post_thumbnail() ) {
	        the_post_thumbnail('full',array('class'=>'alignleft featuredImage'));
        } ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'college-application-essay-coach' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="entry-meta<?php echo $hideMetaClass; ?>">
        <span class="org"><?php echo get_bloginfo('name'); ?></span>
		<span class="entry-date updated">
			<time class="entry-date" datetime="<?php the_modified_date('F j, Y'); ?> at <?php the_modified_date('g:i a');?>"><?php the_modified_date('F j, Y'); ?> at <?php the_modified_date('g:i a');?></time>
		</span>
		<span class="byline">
			<span class="author vcard">
				<span class="fn n"><?php the_author(); ?></span>
			</span>
		</span>
	</div>
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'college-application-essay-coach' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
