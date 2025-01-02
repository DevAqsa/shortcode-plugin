jQuery(document).ready(function($) {
    // Initialize color picker
    $('.color-picker').wpColorPicker();
    
    // Optional: Add copy functionality
    $('.msp-shortcode-copy input').click(function() {
        $(this).select();
    });
});