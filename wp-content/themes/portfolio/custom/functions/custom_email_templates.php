<?php

// Apply shortcodes to CF7 email body (if any)
add_filter('wpcf7_mail_components', 'apply_shortcodes_to_cf7_email', 10, 3);

function apply_shortcodes_to_cf7_email($components, $contact_form, $instance)
{
    if (!empty($components['body'])) {
        // Process shortcodes in the email body
        $components['body'] = do_shortcode($components['body']);
    }

    // Inject <link> tag into <head>
    $css_link_tag = get_vite_email_css_link_tag();
    if ($css_link_tag) {
        $components['body'] = preg_replace('/<\/head>/i', $css_link_tag . "\n</head>", $components['body']);
    }

    return $components;
}

// Custom shortcode for including email template
add_shortcode('email_template', 'custom_cf7_email_template_shortcode');

function custom_cf7_email_template_shortcode($atts)
{
    $atts = shortcode_atts([
        'template' => 'default',
    ], $atts);

    $submission = WPCF7_Submission::get_instance();
    if (!$submission) return '';

    // Get the path to the template
    $template_path = get_template_directory() . '/emails/templates/' . sanitize_file_name($atts['template']) . '.php';

    if (!file_exists($template_path)) return '';

    ob_start();
    include $template_path;
    return ob_get_clean();
}

// Fetch and return the Vite CSS stylesheet link for emails
function get_vite_email_css_link_tag()
{
    $manifest_path = DIST_PATH . '/manifest.json';
    $dist_url = get_template_directory_uri() . '/dist';

    if (!file_exists($manifest_path)) {
        return '';
    }

    $manifest = json_decode(file_get_contents($manifest_path), true);

    if (isset($manifest['email.css'])) {
        $css_file = $manifest['email.css']['file'];
        $css_url = $dist_url . '/' . $css_file;

        return '<link rel="stylesheet" href="' . esc_url($css_url) . '" />';
    }

    return '';
}
