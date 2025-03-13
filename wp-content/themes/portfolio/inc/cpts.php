<?php

/** CPTS **/
function create_posttype()
{
    global $cpt_project;
    register_custom_post_type($cpt_project);
}

$cpt_project = [
    'name' => __('Projet', 'theme_core'),
    'slug' => 'project',
    'menu_icon' => 'dashicons-portfolio',
    'menu_position' => 5,
    'rewrite' => ['slug' => 'projects'],
    'labels' => [
        'name' => __('Projets', 'theme_core'),
        'singular_name' => __('Projet', 'theme_core'),
        'menu_name' => __('Projets', 'theme_core'),
        'add_new' => __('Ajouter un projet', 'theme_core'),
        'add_new_item' => __('Ajouter un nouveau projet', 'theme_core'),
        'new_item' => __('Nouveau projet', 'theme_core'),
        'edit_item' => __('Modifier le projet', 'theme_core'),
        'view_item' => __('Voir le projet', 'theme_core'),
        'search_items' => __('Rechercher un projet', 'theme_core'),
        'not_found' => __('Aucun projet trouvé', 'theme_core'),
        'all_items' => __('Tous les projets', 'theme_core'),
    ],
    'supports' => ['title', 'thumbnail'],
    'publicly_queryable' => true,
];

function register_custom_post_type($post_type)
{
    $name = $post_type['name'];
    $labels = $post_type['labels'] ?? [
        'name' => $name . 's',
        'singular_name' => $name,
        'menu_name' => $name . 's',
        'add_new' => __('Ajouter un élément', 'theme_core'),
        'add_new_item' => __('Ajouter un nouvel élément', 'theme_core'),
        'new_item' => __('Nouvel élément', 'theme_core'),
        'edit_item' => __('Modifier un élément', 'theme_core'),
        'view_item' => __('Voir l\'élément', 'theme_core'),
        'search_items' => __('Rechercher un élément', 'theme_core'),
        'not_found' => __('Aucun élément trouvé', 'theme_core'),
        'all_items' => __('Tous les éléments', 'theme_core'),
    ];

    $args = [
        'label' => $name,
        'labels' => $labels,
        'publicly_queryable' => $post_type['publicly_queryable'] ?? false,
        'menu_icon' => $post_type['menu_icon'] ?? 'dashicons-admin-post',
        'has_archive' => $post_type['has_archive'] ?? false,
        'show_in_nav_menus' => $post_type['show_in_nav_menus'] ?? false,
        'rewrite' => $post_type['rewrite'] ?? true,
        'supports' => $post_type['supports'] ?? ['title', 'thumbnail'],
        'public' => $post_type['public'] ?? true,
        'menu_position' => $post_type['menu_position'] ?? 10,
        'show_ui' => true,
        'show_in_menu' => true,
    ];

    if (isset($post_type['additional_args'])) {
        $args = array_merge($args, $post_type['additional_args']);
    }

    register_post_type($post_type['slug'], $args);

    if (isset($post_type['taxonomies'])) {
        foreach ($post_type['taxonomies'] as $taxonomy) {
            $t_name = $taxonomy['name'];
            $t_labels = isset($post_type['labels']) ? $taxonomy['labels'] :
                [
                    'name' => $t_name . 's',
                    'singular_name' => $t_name,
                    'all_items' => __('Tous les termes', 'theme_core'),
                    'edit_item' => __('Éditer le terme', 'theme_core'),
                    'view_item' => __('Voir le terme', 'theme_core'),
                    'update_item' => __('Mettre à jour le terme', 'theme_core'),
                    'add_new_item' => __('Ajouter un terme', 'theme_core'),
                    'new_item_name' => __('Nouveau terme', 'theme_core'),
                    'search_items' => __('Rechercher parmi les termes', 'theme_core'),
                    'popular_items' => __('Termes les plus utilisés', 'theme_core'),
                ];

            $t_args = [
                'label' => $t_name,
                'labels' => $t_labels,
                'show_admin_column' => true,
                'hierarchical' => $taxonomy['hierarchical'] ?? true,
            ];

            if (array_key_exists('hide_meta_box', $taxonomy)) {
                $t_args['meta_box_cb'] = false;
            }

            register_taxonomy(
                $taxonomy['slug'],
                $post_type['slug'],
                $t_args
            );
        }
    }
}

add_action('init', 'create_posttype');
