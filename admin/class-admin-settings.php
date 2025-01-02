<?php
class MSP_Admin_Settings {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_menu_page'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function add_menu_page() {
        add_menu_page(
            'Shortcode Settings',
            'Shortcode Plugin',
            'manage_options',
            'msp-settings',
            array($this, 'settings_page'),
            'dashicons-shortcode',
            30
        );
    }

    public function register_settings() {
        register_setting('msp_settings_group', 'msp_settings');

        add_settings_section(
            'msp_general_section',
            'General Settings',
            array($this, 'section_callback'),
            'msp-settings'
        );

        add_settings_field(
            'default_title',
            'Default Title',
            array($this, 'title_callback'),
            'msp-settings',
            'msp_general_section'
        );

        add_settings_field(
            'default_color',
            'Default Color',
            array($this, 'color_callback'),
            'msp-settings',
            'msp_general_section'
        );
    }

    public function settings_page() {
        include MSP_PLUGIN_PATH . 'admin/templates/settings-page.php';
    }

    // Settings callbacks
    public function section_callback() {
        echo '<p>Configure your shortcode plugin settings below:</p>';
    }

    public function title_callback() {
        $options = get_option('msp_settings');
        echo '<input type="text" name="msp_settings[default_title]" value="' . 
             esc_attr($options['default_title']) . '" />';
    }

    public function color_callback() {
        $options = get_option('msp_settings');
        echo '<input type="color" name="msp_settings[default_color]" value="' . 
             esc_attr($options['default_color']) . '" />';
    }

    public function enqueue_admin_scripts($hook) {
        if ('toplevel_page_msp-settings' !== $hook) {
            return;
        }
        
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        
        wp_enqueue_script(
            'msp-admin',
            MSP_PLUGIN_URL . 'admin/js/admin.js',
            array('jquery', 'wp-color-picker'),
            '1.0.0',
            true
        );
    }
}