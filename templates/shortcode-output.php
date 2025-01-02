<div class="msp-shortcode-wrapper msp-style-<?php echo esc_attr($atts['style']); ?>">
    <h2 style="color: <?php echo esc_attr($atts['color']); ?>">
        <?php echo esc_html($atts['title']); ?>
    </h2>
    <?php if ($content): ?>
        <div class="msp-content">
            <?php echo wp_kses_post($content); ?>
        </div>
    <?php endif; ?>
</div>