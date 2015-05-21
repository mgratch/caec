<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package College Application Essay Coach
 */

if ( ! function_exists( 'college_application_essay_coach_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function college_application_essay_coach_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'college-application-essay-coach' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'college-application-essay-coach' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'college-application-essay-coach' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'college_application_essay_coach_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function college_application_essay_coach_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'college-application-essay-coach' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'college-application-essay-coach' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'college-application-essay-coach' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'college_application_essay_coach_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function college_application_essay_coach_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	/*
	 if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
	}
	*/

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
		//esc_attr( get_the_modified_date( 'c' ) ),
		//esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'college-application-essay-coach' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( '<i class="fa fa-user"></i> By %s', 'post author', 'college-application-essay-coach' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on post-data">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

/**
 * Returns an Edit Profile URL for current logged in USER.
 */
function get_admin_edit_user_link( $user_id ){

	if ( get_current_user_id() == $user_id ){
		$edit_link = '<a href="'.get_edit_profile_url( $user_id ).'" class="edit-link" >';
		$edit_link .= sprintf( __( "Edit" ) );
		$edit_link .= "</a>";
	}
	else{
		$edit_link = NULL;
	}

	return $edit_link;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function college_application_essay_coach_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'college_application_essay_coach_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'college_application_essay_coach_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so college_application_essay_coach_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so college_application_essay_coach_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in college_application_essay_coach_categorized_blog.
 */
function college_application_essay_coach_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'college_application_essay_coach_categories' );
}
add_action( 'edit_category', 'college_application_essay_coach_category_transient_flusher' );
add_action( 'save_post',     'college_application_essay_coach_category_transient_flusher' );


if ( ! function_exists( 'lwi_custom_continue_reading_link' ) ) :
function lwi_custom_continue_reading_link() {
	return '<div class="space15"></div><a href="'.esc_url( get_permalink() ).'" title="'.sprintf( __( "Read more about %s" ), the_title_attribute( 'echo=0' ) ).'" class="btn"><i class="fa fa-book"></i>Continue Reading</a><div class="space40"></div>';
}
endif; // lwi_custom_continue_reading_link
