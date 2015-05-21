<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package College Application Essay Coach
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function college_application_essay_coach_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'college_application_essay_coach_jetpack_setup' );

/**
 * Add theme support for Responsive video.
 * See: http://jetpack.me/2014/07/31/jetpack-3-1-portfolio-custom-post-types-a-new-logo-and-much-more/
 */
add_theme_support( 'jetpack-responsive-videos' );

/**
 * Remove Sharing_display from the loop and allow users to place it anywhere with echo sharing_display()
 */
function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
 
add_action( 'loop_start', 'jptweak_remove_share' );
