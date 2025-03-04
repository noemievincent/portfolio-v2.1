<?php

function nv_load_more_projects()
{
    wp_reset_query();

    $count = array_key_exists('count', $_POST) ? $_POST['count'] : -1;
    $offset = array_key_exists('offset', $_POST) ? $_POST['offset'] : 0;

    $ajax_posts = nv_get_projects($count, $offset);
    $projects = $ajax_posts->projects;

    $items = [];
    $response = [];

    if ($projects->have_posts()) {
        while ($projects->have_posts()) : $projects->the_post();
            ob_start();
            include get_template_directory() . '/template-parts/cards/project.php';
            $items[] = ob_get_clean();
        endwhile;
        wp_reset_postdata();
    }

    $response = array_merge($response, [
        'items' => $items,
        'max_total' => $projects->found_posts,
    ]);

    echo json_encode($response);
    exit;
}

add_action('wp_ajax_load_more_projects', 'nv_load_more_projects');
add_action('wp_ajax_nopriv_load_more_projects', 'nv_load_more_projects');

function nv_get_projects($count = -1, $offset = 0)
{
    global $cpt_project;

    $args = [
        'post_type' => $cpt_project['slug'],
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => $count,
        'offset' => $offset,
    ];

    $projects = new WP_Query($args);

    return (object)['projects' => $projects];
}