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

add_action('after_setup_theme', 'nv_setup');

function nv_setup()
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

add_action('acf/init', 'create_acf_options_page');
function create_acf_options_page()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Options générales',
            'menu_title' => 'Options générales',
            'menu_slug' => 'nv-core-common-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
        ]);
    }
}