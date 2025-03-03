<?php

/* Replace CF7 submit input by a button */
// Remove default submit tag
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');

// Handle the button markup
add_action('wpcf7_init', 'child_cf7_button');

// Add submit button tag
if (!function_exists('child_cf7_button')) {
    function child_cf7_button()
    {
        wpcf7_add_form_tag('submit', 'child_cf7_button_handler');
    }
}

// Button markup inside handler
if (!function_exists('child_cf7_button_handler')) {
    function child_cf7_button_handler($tag)
    {
        $tag = new WPCF7_FormTag($tag);
        $value = isset($tag->values[0]) ? $tag->values[0] : '';

        $class = wpcf7_form_controls_class($tag->type);
        $atts = [
            'class' => $tag->get_class_option($class),
            'id' => $tag->get_id_option(),
            'tabindex' => $tag->get_option('tabindex', 'int', true),
            'type' => 'submit',
        ];

        $atts = wpcf7_format_atts($atts);

        $html = file_get_contents(get_template_directory() . '/template-parts/custom-submit-button.php');
        $html = str_replace(
            ['%value%'],
            [$value],
            $html
        );

        return $html;
    }
}