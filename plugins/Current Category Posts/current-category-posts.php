<?php

/**
 * Plugin Name: Current Category Posts
 * Plugin URI: https://github.com/mgratch/current-category-posts/
 * Description: Easily display the current category's (taxononomy or term) posts without creating a new menu to keep an sidebar index current.
 * Author: Marc Gratch
 * Version: 1.0
 * Author URI: marcgratch.com
 * GitHub Plugin URI: mgratch/current-category-posts/
 * License: MIT License
 */

/**
 * Load Custom Widget file
 */

define( 'LWICCP_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'LWICCP_INCLUDES', LWICCP_PATH . trailingslashit( 'inc' ) );
require LWICCP_INCLUDES . 'current-category-posts-widget.php';

add_action( 'widgets_init', 'lwi_register_widget');
function lwi_register_widget() {
    register_widget('Current_Category_Posts');
}

add_filter( 'lwi_widget_posts_args', 'my_widget_posts_args');
function my_widget_posts_args($args) {
    if ( is_category() ) { //adds the category parameter in the query if we display a category
        $cat = get_queried_object();
        $args = array_merge($args,array('category__in' => $cat -> term_id));
        return $args;
    }
else {

        $the_terms = get_the_terms(get_the_ID(),'category');
        foreach ($the_terms as $term){
            $the_term  = $term->term_id;
        }

        $args = array_merge($args,array('category__in' => $the_term));
        return $args;
    }
}