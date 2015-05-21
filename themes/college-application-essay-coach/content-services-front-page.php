<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package College Application Essay Coach
 */
$the_id = get_the_ID();
$lwi_service_icon = get_post_meta( $the_id, 'lwi_font_icon', true );
if (empty($lwi_service_icon)){
    $lwi_service_icon = '<i class="fa fa-bullhorn"></i>';
}
else {
    $lwi_service_icon = do_shortcode("[icon name='{$lwi_service_icon}']");
}

$lwi_service_width = get_post_meta( $the_id, 'service_width', true );
if (empty($lwi_service_width)){
    $lwi_service_width = '4';
}

?>

    <div class="service-wrapper col-md-<?php echo $lwi_service_width; ?>">

        <div class="service" >
            <div class="section-header">
                <?php echo $lwi_service_icon; ?>
                <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
            </div>
	        <div class="service-content">
		        <?php the_content(); ?>
	        </div><!-- .entry-content -->
            <?php edit_post_link( __( 'Edit', 'college-application-essay-coach' ), '<span class="edit-link">', '</span>' ); ?>
        </div>
    </div>