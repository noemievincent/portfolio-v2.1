<?php

function custom_language_switcher()
{
    $languages = pll_the_languages(['raw' => 1]);
    $current = pll_current_language();

    if (!empty($languages)) {
        ob_start();
        include get_template_directory() . '/template-parts/custom-language-switcher.php';
        echo ob_get_clean();
    }
}
