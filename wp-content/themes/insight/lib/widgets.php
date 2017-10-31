<?php
// Register Widgets
// https://codex.wordpress.org/Function_Reference/register_widget

class c2a extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( false, 'Call to Action' );
    }

    function widget( $args, $instance ) {
        $title = empty( $instance[ 'title' ] ) ? 'Ready to begin?' : apply_filters( 'widget_title', $instance[ 'title' ] );
        $buttonText = empty( $instance[ 'buttonText' ] ) ? 'Request a quote' : $instance[ 'buttonText' ];
        $buttonLink = empty( $instance[ 'buttonLink' ] ) ? 'http://insightba.net/' : $instance[ 'buttonLink' ];

        // before and after widget arguments are defined by themes
        echo $args[ 'before_widget' ];
        echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
        echo "<a href='{$buttonLink}' class='btn btn-dark'>{$buttonText}</a>";
        echo $args[ 'after_widget' ];
    }

    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance = array();
        $instance[ 'title' ] = $new_instance[ 'title' ];
        $instance[ 'buttonText' ] = $new_instance[ 'buttonText' ];
        $instance[ 'buttonLink' ] = $new_instance[ 'buttonLink' ];
        return $instance;
    }

    function form( $instance ) {
        $title   = isset($instance['title']) ? $instance['title'] :  __('Ready to begin?', 'wpb_widget_domain');
        $buttonText = isset($instance['buttonText']) ? $instance['buttonText'] : __('Request a quote', 'wpb_widget_domain');
        $buttonLink = isset($instance['buttonLink']) ? $instance['buttonLink'] : __('http://insightba.net', 'wpb_widget_domain');
        
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'buttonText' ); ?>">Button Text:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'buttonText' ); ?>" name="<?php echo $this->get_field_name( 'buttonText' ); ?>" type="text" value="<?php echo esc_attr($buttonText); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'buttonLink' ); ?>">Button Link:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'buttonLink' ); ?>" name="<?php echo $this->get_field_name( 'buttonLink' ); ?>" type="url" value="<?php echo esc_attr($buttonLink); ?>"/>
        </p>
        </p>
        <?php
    }
}

function load_widgets() {
    register_widget( __NAMESPACE__ . '\\c2a' );
}
add_action( 'widgets_init', __NAMESPACE__ . '\\load_widgets' );