<div class="wrap">
    
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <!-- Settings Form -->
    <form action="options.php" method="post">
        <?php
        settings_fields('msp_settings_group');
        do_settings_sections('msp-settings');
        submit_button('Save Settings');
        ?>
    </form>

    <!-- Shortcode Usage Guide -->
    <div class="msp-shortcode-guide" style="margin-top: 40px; background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px;">
        <h2>Available Shortcodes</h2>
        
        <div class="msp-shortcode-example" style="margin: 20px 0; padding: 15px; background: #f8f9fa; border-left: 4px solid #0073aa;">
            <h3>Basic Usage</h3>
            <code style="display: block; padding: 10px; background: #f1f1f1; margin: 10px 0;">
                [custom_box]Your content here[/custom_box]
            </code>
        </div>

        <div class="msp-shortcode-example" style="margin: 20px 0; padding: 15px; background: #f8f9fa; border-left: 4px solid #0073aa;">
            <h3>With Custom Attributes</h3>
            <code style="display: block; padding: 10px; background: #f1f1f1; margin: 10px 0;">
                [custom_box title="My Custom Title" color="#ff0000" style="default"]Your content here[/custom_box]
            </code>
        </div>

        <div class="msp-shortcode-attributes" style="margin-top: 20px;">
            <h3>Available Attributes</h3>
            <table class="widefat" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th>Attribute</th>
                        <th>Description</th>
                        <th>Default Value</th>
                        <th>Example</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>title</code></td>
                        <td>The title of your box</td>
                        <td><?php $options = get_option('msp_settings'); echo esc_html($options['default_title']); ?></td>
                        <td><code>title="My Title"</code></td>
                    </tr>
                    <tr>
                        <td><code>color</code></td>
                        <td>Title color (hex or color name)</td>
                        <td><?php echo esc_html($options['default_color']); ?></td>
                        <td><code>color="#ff0000"</code></td>
                    </tr>
                    <tr>
                        <td><code>style</code></td>
                        <td>Box style variant</td>
                        <td>default</td>
                        <td><code>style="default"</code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="msp-shortcode-copy" style="margin-top: 20px;">
            <h3>Quick Copy</h3>
            <?php
            $default_shortcode = '[custom_box title="' . esc_attr($options['default_title']) . 
                               '" color="' . esc_attr($options['default_color']) . 
                               '"]Your content here[/custom_box]';
            ?>
            <input type="text" 
                   value="<?php echo esc_attr($default_shortcode); ?>" 
                   class="large-text code"
                   onclick="this.select();"
                   readonly
                   style="margin: 10px 0;">
            <p class="description">Click to select, then copy (Ctrl/Cmd + C)</p>
        </div>
    </div>
</div>