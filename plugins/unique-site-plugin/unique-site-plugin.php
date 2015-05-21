<?php
/**
* Plugin Name: Unique Site Plugin
* Plugin URI: http://liveworksink.com/
* Description: This plugin activates Custom Post Types for CollegeApplicationEssayCoach.com
* Author: Marc Gratch
* Version: 1.0
* Author URI: marcgratch.com
* License: MIT License
*/

/**
 * Add Widget to display testimonials stored as Custom Post Type
 * @todo Make the widget and Testimonials CPT a single plugin
 * @todo Add options to the widget
 * @todo add proper rich snippet markup for reviews
 */

define( 'LWIUSP_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'LWIUSP_INCLUDES', LWIUSP_PATH . trailingslashit( 'inc' ) );
require LWIUSP_INCLUDES . 'cpt-testimonials-display-widget.php';

add_action( 'widgets_init', 'lwi_register_test_widget');
function lwi_register_test_widget() {
    register_widget('Testimonials_Display_Widget');
}
/**
 * Custom Post Types To be moved out of theme later
 */
add_action( 'init', 'register_cpt_lwi_service' );

function register_cpt_lwi_service() {

    $labels = array(
        'name' => _x( 'Services', 'lwi_service' ),
        'singular_name' => _x( 'Service', 'lwi_service' ),
        'add_new' => _x( 'Add New', 'lwi_service' ),
        'add_new_item' => _x( 'Add New Service', 'lwi_service' ),
        'edit_item' => _x( 'Edit Service', 'lwi_service' ),
        'new_item' => _x( 'New Service', 'lwi_service' ),
        'view_item' => _x( 'View Service', 'lwi_service' ),
        'search_items' => _x( 'Search Services', 'lwi_service' ),
        'not_found' => _x( 'No services found', 'lwi_service' ),
        'not_found_in_trash' => _x( 'No services found in Trash', 'lwi_service' ),
        'parent_item_colon' => _x( 'Parent Service:', 'lwi_service' ),
        'menu_name' => _x( 'Services', 'lwi_service' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Services Provided by College Application Essay Coach.',
        'supports' => array( 'title', 'editor', 'revisions' ),

        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,

        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => false,
        'can_export' => true,
        'rewrite' => array(
            'slug' => 'services',
            'with_front' => FALSE
        ),
        'capability_type' => 'post'
    );

    register_post_type( 'lwi_service', $args );
}

/**
 ** Testimonial Custom Post Type
 */
add_action( 'init', 'register_cpt_lwi_testimonial' );
function register_cpt_lwi_testimonial() {

    $labels = array(
        'name' => _x( 'Testimonials', 'lwi_testimonial' ),
        'singular_name' => _x( 'Testimonial', 'lwi_testimonial' ),
        'add_new' => _x( 'Add New', 'lwi_testimonial' ),
        'add_new_item' => _x( 'Add New Testimonial', 'lwi_testimonial' ),
        'edit_item' => _x( 'Edit Testimonial', 'lwi_testimonial' ),
        'new_item' => _x( 'New Testimonial', 'lwi_testimonial' ),
        'view_item' => _x( 'View Testimonial', 'lwi_testimonial' ),
        'search_items' => _x( 'Search Testimonials', 'lwi_testimonial' ),
        'not_found' => _x( 'No testimonials found', 'lwi_testimonial' ),
        'not_found_in_trash' => _x( 'No testimonials found in Trash', 'lwi_testimonial' ),
        'parent_item_colon' => _x( 'Parent Testimonial:', 'lwi_testimonial' ),
        'menu_name' => _x( 'Testimonials', 'lwi_testimonial' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Testimonials from happy clients and their parents.',
        'supports' => array( 'title', 'editor', 'revisions' ),

        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,

        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => false,
        'can_export' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'lwi_testimonial', $args );
}

add_action( 'init', 'register_cpt_fee' );
function register_cpt_fee() {

    $labels = array(
        'name' => _x( 'Fees', 'lwi_fee' ),
        'singular_name' => _x( 'lwi_fee', 'lwi_fee' ),
        'add_new' => _x( 'Add New', 'lwi_fee' ),
        'all_items' => _x( 'Fees', 'lwi_fee' ),
        'add_new_item' => _x( 'Add New Fee', 'lwi_fee' ),
        'edit_item' => _x( 'Edit Fee', 'lwi_fee' ),
        'new_item' => _x( 'New Fee', 'lwi_fee' ),
        'view_item' => _x( 'View Fee', 'lwi_fee' ),
        'search_items' => _x( 'Search Fees', 'lwi_fee' ),
        'not_found' => _x( 'No fees found', 'lwi_fee' ),
        'not_found_in_trash' => _x( 'No fees found in Trash', 'lwi_fee' ),
        'parent_item_colon' => _x( 'Parent Fee:', 'lwi_fee' ),
        'menu_name' => _x( 'Fees', 'lwi_fee' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Fees for Services Provided by College Application Essay Coach.',
        'supports' => array( 'title', 'editor', 'revisions' ),

        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => false,
        'can_export' => true,
        'rewrite' => array(
            'slug' => 'fees',
            'with_front' => FALSE
        ),
        'capability_type' => 'post'
    );
    register_post_type( 'lwi_fee', $args );
}

add_action( 'init', 'register_cpt_my_process' );
function register_cpt_my_process() {

    $labels = array(
        'name' => _x( 'My Process', 'lwi_my_process' ),
        'singular_name' => _x( 'Step in My Process', 'lwi_my_process' ),
        'add_new' => _x( 'Add New Step', 'lwi_my_process' ),
        'all_items' => _x( 'My Process', 'lwi_my_process' ),
        'add_new_item' => _x( 'Add New Step', 'lwi_my_process' ),
        'edit_item' => _x( 'Edit This Step', 'lwi_my_process' ),
        'new_item' => _x( 'New Step in My Process', 'lwi_my_process' ),
        'view_item' => _x( 'View This Step', 'lwi_my_process' ),
        'search_items' => _x( 'Search Steps in My Process', 'lwi_my_process' ),
        'not_found' => _x( 'No Process found', 'lwi_my_process' ),
        'not_found_in_trash' => _x( 'No Steps to My Process found in Trash', 'lwi_my_process' ),
        'parent_item_colon' => _x( 'Parent Step:', 'lwi_my_process' ),
        'menu_name' => _x( 'My Process', 'lwi_my_process' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Steps to Mindy Pollack-Fusi&#39;s Process for working with students ',
        'supports' => array( 'title', 'editor', 'revisions' ),

        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,

        'show_in_nav_menus' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => false,
        'can_export' => true,
        'rewrite' => array(
            'slug' => 'my-process',
            'with_front' => FALSE
        ),
        'capability_type' => 'post'
    );
    register_post_type( 'lwi_my_process', $args );
}

add_action('gravityview/approve_entries/approved','publish_pending_testimonial');
function publish_pending_testimonial($entry_id){

    $entry = RGFormsModel::get_lead($entry_id);
    if ($entry['post_id'] != null){
        $my_post = array(
            'ID'           => $entry['post_id'],
            'post_status'   => 'publish'
        );

        // Update the post into the database
        wp_update_post( $my_post );
    }
}

add_action('gravityview/approve_entries/disapproved','unpublish_pending_testimonial');
function unpublish_pending_testimonial($entry_id){

    $entry = RGFormsModel::get_lead($entry_id);
    if ($entry['post_id'] != null){
        $my_post = array(
            'ID'           => $entry['post_id'],
            'post_status'   => 'pending'
        );

        // Update the post into the database
        wp_update_post( $my_post );
    }
}