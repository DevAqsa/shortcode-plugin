<?php
/**
 * Plugin Name: Advanced Shortcode Plugin
 * Plugin URI: https://example.com
 * Description: Advanced shortcode plugin with admin settings and widgets
 * Version: 1.0
 * Author: Aqsa Mumtaz
 * Author URI: https://example.com
 * License: GPL v2 or later
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('MSP_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('MSP_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include required files
require_once MSP_PLUGIN_PATH . 'includes/class-shortcode-handler.php';
require_once MSP_PLUGIN_PATH . 'admin/class-admin-settings.php';
require_once MSP_PLUGIN_PATH . 'includes/class-shortcode-widget.php';

// Initialize the plugin
function msp_initialize_plugin() {
    $shortcode_handler = new MSP_Shortcode_Handler();
    $admin_settings = new MSP_Admin_Settings();
    
    // Register the widget
    add_action('widgets_init', function() {
        register_widget('MSP_Shortcode_Widget');
    });
}
add_action('plugins_loaded', 'msp_initialize_plugin');

// Activation hook
register_activation_hook(__FILE__, 'msp_activate_plugin');
function msp_activate_plugin() {
    // Set default options
    $defaults = array(
        'default_title' => 'My Shortcode',
        'default_color' => '#0073aa',
        'enable_widget' => 'yes'
    );
    add_option('msp_settings', $defaults);
}

// Deactivation hook
register_deactivation_hook(__FILE__, 'msp_deactivate_plugin');
function msp_deactivate_plugin() {
    // Cleanup if needed
}