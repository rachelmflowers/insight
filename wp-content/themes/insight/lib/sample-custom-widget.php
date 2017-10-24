// Register Widgets
// https://codex.wordpress.org/Function_Reference/register_widget

class welcome_message extends\ WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( false, 'Home Welcome Message' );
    }

    function widget( $args, $instance ) {
        $title = empty( $instance[ 'title' ] ) ? 'Hello.' : apply_filters( 'widget_title', $instance[ 'title' ] );
        $message = empty( $instance[ 'message' ] ) ? 'Welcome to Insight Benefit Administrators.' : $instance[ 'message' ];

        // before and after widget arguments are defined by themes
        echo $args[ 'before_widget' ];
        echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
        echo '<p>' . $message . '</p>';
        echo $args[ 'after_widget' ];
    }

    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance = array();
        $instance[ 'title' ] = $new_instance[ 'title' ];
        $instance[ 'message' ] = $new_instance[ 'message' ];
        return $instance;
    }

    function form( $instance ) {
        $title   = isset($instance['title']) ? $instance['title'] :  __('Hello.', 'wpb_widget_domain');
        $message = isset($instance['message']) ? $instance['message'] : __('Welcome to Insight Benefit Administrators.', 'wpb_widget_domain');
        
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'message' ); ?>">Message:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'message' ); ?>" name="<?php echo $this->get_field_name( 'message' ); ?>" type="text" value="<?php echo esc_attr($message); ?>"/>
        </p>
        </p>
        <?php
    }
}

function load_widgets() {
    register_widget( __NAMESPACE__ . '\\welcome_message' );
}
add_action( 'widgets_init', __NAMESPACE__ . '\\load_widgets' );