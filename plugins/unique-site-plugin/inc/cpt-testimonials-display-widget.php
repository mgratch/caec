<?php

class Testimonials_Display_Widget extends WP_Widget {

    public function __construct() {
        $widget_ops = array('classname' => 'widget_cpt_testimonials', 'description' => __( "Displaying Testimonials") );
        parent::__construct('testimonials-display', __('Display Testimonials'), $widget_ops);
        $this->alt_option_name = 'widget_testimonials_display_entries';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

	/**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance) {
        $cache = array();
        if ( ! $this->is_preview() ) {
            $cache = wp_cache_get( 'widget_testimonials_display_entries', 'widget' );
        }

        if ( ! is_array( $cache ) ) {
            $cache = array();
        }

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( '' );

        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );


        if( ! empty( $instance['number'] ) && intval( $instance['number'] ) >= -1){
            $number = intval( $instance['number'] );
        }
        elseif( ! empty( $instance['number'] ) && intval( $instance['number'] ) < -1){
            $number = absint($instance['number']);
        }
        else {
            $number = 5;
        }

    /**
    * Filter the arguments for the Recent Posts widget.
    *
    * @since 3.4.0
    *
    * @see WP_Query::get_posts()
    *
    * @param array $args An array of arguments used to retrieve the recent posts.
    */

    $r = new WP_Query( apply_filters( 'lwi_widget_testimonials_args', array(
            'post_type'           => 'lwi_testimonial',
            'posts_per_page'      => $number,
            'orderby'             => 'rand',
            'no_found_rows'       => false,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'Update_post_term_cache' => false,
            'Update_Post_meta_cache' => false
            )
        )
    );

    if ($r->have_posts()) :
    ?>

    <?php echo $args['before_widget']; ?>

    <?php if ( $title ) {
        echo $args['before_title'] . $title . $args['after_title'];
    } ?>

    <ul>
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
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
                </div><!-- .entry-content -->
                <footer class="entry-footer">
                    <?php edit_post_link( __( 'Edit', 'college-application-essay-coach' ), '<span class="edit-link">', '</span>' ); ?>
                </footer><!-- .entry-footer -->
            </aside><!-- #post-## -->

        <?php endwhile; ?>
    </ul>
    <?php echo $args['after_widget']; ?>
    <?php
    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    endif;

        if ( ! $this->is_preview() ) {
            $cache[ $args['widget_id'] ] = ob_get_flush();
            wp_cache_set( 'widget_testimonials_display_entries', $cache, 'widget' );
        } else {
            ob_end_flush();
        }
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_testimonials_display_entries']) )
            delete_option('widget_testimonials_display_entries');

        return $instance;
    }

    public function flush_widget_cache() {
        wp_cache_delete('widget_testimonials_display_entries', 'widget');
    }

    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        if( isset( $instance['number'] ) && intval( $instance['number'] ) >= -1){
            $number = intval( $instance['number'] );
        }
        elseif( isset( $instance['number'] ) && intval( $instance['number'] ) < -1){
            $number = absint($instance['number']);
        }
        else {
            $number = 5;
        }

        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <?php
    }
}
