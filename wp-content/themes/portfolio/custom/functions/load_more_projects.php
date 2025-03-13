<?php

function portfolio_load_more_projects()
{
    wp_reset_query();

    $count = array_key_exists('count', $_POST) ? $_POST['count'] : -1;
    $offset = array_key_exists('offset', $_POST) ? $_POST['offset'] : 0;

    $ajax_posts = portfolio_get_projects($count, $offset);
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

add_action('wp_ajax_load_more_projects', 'portfolio_load_more_projects');
add_action('wp_ajax_nopriv_load_more_projects', 'portfolio_load_more_projects');

function portfolio_get_projects($count = -1, $offset = 0)
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

function portfolio_get_next_project()
{
    global $cpt_project;

    if (get_adjacent_post(false, '', true)) {
        previous_post_link();
    } else {
        $first = new WP_Query([
            'post_type' => $cpt_project['slug'],
            'posts_per_page' => 1,
            'order' => 'ASC',
        ]);
        $first->the_post();

        echo portfolio_custom_html(get_the_ID());

        wp_reset_query();
    }
}

function portfolio_custom_next_post_link($output, $format, $link, $post_id, $adjacent)
{
    return portfolio_custom_html($post_id);
}

add_filter('previous_post_link', 'portfolio_custom_next_post_link', 10, 5);

function portfolio_custom_html($post_id)
{
    ob_start();
    include get_template_directory() . '/template-parts/custom_next_post_link.php';
    return ob_get_clean();
}

