<?php
// Register Widgets
add_action('widgets_init', function() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'ajaxinwp'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'ajaxinwp'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Additional custom widgets can be registered here
});

// Example Custom Widget
class AjaxinWP_Custom_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'ajaxinwp_custom_widget',
            __('AjaxinWP Custom Widget', 'ajaxinwp'),
            array('description' => __('A custom widget for AjaxinWP theme.', 'ajaxinwp'), )
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        // Custom widget content here
        echo __('Hello, World!', 'ajaxinwp');
        echo $args['after_widget'];
    }

    public function form($instance) {
        // Form for the widget settings in the admin
        $title = !empty($instance['title']) ? $instance['title'] : __('New title', 'ajaxinwp');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'ajaxinwp'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php 
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

add_action('widgets_init', function() {
    register_widget('AjaxinWP_Custom_Widget');
});
