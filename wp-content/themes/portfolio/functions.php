<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

// functions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well

// Main switch to get frontend assets from a Vite dev server OR from production built folder
// it is recommended to move it into wp-config.php
define('IS_VITE_DEVELOPMENT', true);

include "inc/inc.vite.php";
include "inc/cpts.php";

include "custom/functions/custom_submit_button.php";
include "custom/functions/custom_language_switcher.php";
include "custom/functions/load_more_projects.php";

add_action('after_setup_theme', 'theme_core_setup');

function theme_core_setup()
{
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('page-templates');

    register_nav_menus([
        'header' => 'Menu principal',
        'footer' => 'Menu de pied de page',
        'rgpd' => 'RGPD',
    ]);

    // Remove <p> and <br/> from Contact Form 7
    add_filter('wpcf7_autop_or_not', '__return_false');
}