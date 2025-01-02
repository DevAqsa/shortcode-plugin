<?php
class MSP_Shortcode_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'msp_shortcode_widget',
            'Custom Shortcode Widget',
            array('description' => 'Display your custom shortcode content in widgets')
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo do_shortcode('[custom_box title="' . esc_attr($instance['box_title']) . 
             '" color="' . esc_attr($instance['box_color']) . '"]' . 
             esc_html($instance['content']) . '[/custom_box]');
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $box_title = !empty($instance['box_title']) ? $instance['box_title'] : '';
        $box_color = !empty($instance['box_color']) ? $instance['box_color'] : '#0073aa';
        $content = !empty($instance['content']) ? $instance['content'] : '';
        include MSP_PLUGIN_PATH . 'admin/templates/widget-form.php';
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['box_title'] = strip_tags($new_instance['box_title']);
        $instance['box_color'] = strip_tags($new_instance['box_color']);
        $instance['content'] = strip_tags($new_instance['content']);
        return $instance;
    }
}