<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">Widget Title:</label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
           name="<?php echo $this->get_field_name('title'); ?>" type="text" 
           value="<?php echo esc_attr($title); ?>">
</p>
<p>
    <label for="<?php echo $this->get_field_id('box_title'); ?>">Box Title:</label>
    <input class="widefat" id="<?php echo $this->get_field_id('box_title'); ?>" 
           name="<?php echo $this->get_field_name('box_title'); ?>" type="text" 
           value="<?php echo esc_attr($box_title); ?>">
</p>
<p>
    <label for="<?php echo $this->get_field_id('box_color'); ?>">Box Color:</label>
    <input class="widefat" id="<?php echo $this->get_field_id('box_color'); ?>" 
           name="<?php echo $this->get_field_name('box_color'); ?>" type="color" 
           value="<?php echo esc_attr($box_color); ?>">
</p>
<p>
    <label for="<?php echo $this->get_field_id('content'); ?>">Content:</label>
    <textarea class="widefat" id="<?php echo $this->get_field_id('content'); ?>" 
              name="<?php echo $this->get_field_name('content'); ?>"><?php echo esc_textarea($content); ?></textarea>
</p>

