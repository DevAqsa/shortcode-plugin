<?php
class MSP_Shortcode_Handler {
    public function __construct() {
        add_shortcode('custom_box', array($this, 'handle_shortcode'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
    }

    public function handle_shortcode($atts = [], $content = null) {
        $options = get_option('msp_settings');
        
        $atts = shortcode_atts(array(
            'title' => $options['default_title'],
            'color' => $options['default_color'],
            'style' => 'default'
        ), $atts);

        ob_start();
        include MSP_PLUGIN_PATH . 'templates/shortcode-output.php';
        return ob_get_clean();
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            'msp-styles',
            MSP_PLUGIN_URL . 'assets/css/style.css',
            array(),
            '1.0.0'
        );
    }
}