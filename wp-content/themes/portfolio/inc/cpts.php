<?php

/** CPTS **/
function create_posttype()
{
    global $cpt_project;
    register_custom_post_type($cpt_project);
}

$cpt_project = [
    'name' => __('Projet', THEME_TEXT_DOMAIN),
    'slug' => 'project',
    'menu_icon' => 'dashicons-portfolio',
    'menu_position' => 5,
    'rewrite' => ['slug' => 'projects'],
    'labels' => [
        'name' => __('Projets', THEME_TEXT_DOMAIN),
        'singular_name' => __('Projet', THEME_TEXT_DOMAIN),
        'menu_name' => __('Projets', THEME_TEXT_DOMAIN),
        'add_new' => __('Ajouter un projet', THEME_TEXT_DOMAIN),
        'add_new_item' => __('Ajouter un nouveau projet', THEME_TEXT_DOMAIN),
        'new_item' => __('Nouveau projet', THEME_TEXT_DOMAIN),
        'edit_item' => __('Modifier le projet', THEME_TEXT_DOMAIN),
        'view_item' => __('Voir le projet', THEME_TEXT_DOMAIN),
        'search_items' => __('Rechercher un projet', THEME_TEXT_DOMAIN),
        'not_found' => __('Aucun projet trouvé', THEME_TEXT_DOMAIN),
        'all_items' => __('Tous les projets', THEME_TEXT_DOMAIN),
    ],
    'supports' => ['title', 'thumbnail'],
    'publicly_queryable' => true,
];

function register_custom_post_type($post_type): void
{
    $name = $post_type['name'];
    $labels = $post_type['labels'] ?? [
        'name' => $name . 's',
        'singular_name' => $name,
        'menu_name' => $name . 's',
        'name_admin_bar' => $name . 's',
        'add_new' => __('Ajouter', THEME_TEXT_DOMAIN),
        'add_new_item' => __('Ajouter un nouvel élément', THEME_TEXT_DOMAIN),
        'edit_item' => __('Modifier l\'élément', THEME_TEXT_DOMAIN),
        'new_item' => __('Nouvel élément', THEME_TEXT_DOMAIN),
        'view_item' => __('Voir l\'élément', THEME_TEXT_DOMAIN),
        'view_items' => __('Voir les éléments', THEME_TEXT_DOMAIN),
        'search_items' => __('Rechercher des éléments', THEME_TEXT_DOMAIN),
        'not_found' => __('Aucun élément trouvé.', THEME_TEXT_DOMAIN),
        'not_found_in_trash' => __('Aucun élément trouvé dans la corbeille.', THEME_TEXT_DOMAIN),
        'all_items' => __('Tous les éléments', THEME_TEXT_DOMAIN),
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
                    'search_items' => __('Rechercher parmi les termes', THEME_TEXT_DOMAIN),
                    'popular_items' => __('Termes les plus utilisés', THEME_TEXT_DOMAIN),
                    'all_items' => __('Tous les termes', THEME_TEXT_DOMAIN),
                    'edit_item' => __('Éditer le terme', THEME_TEXT_DOMAIN),
                    'view_item' => __('Voir le terme', THEME_TEXT_DOMAIN),
                    'update_item' => __('Mettre à jour le terme', THEME_TEXT_DOMAIN),
                    'add_new_item' => __('Ajouter un terme', THEME_TEXT_DOMAIN),
                    'new_item_name' => __('Nouveau terme', THEME_TEXT_DOMAIN),
                ];

            $t_args = [
                'label' => $t_name,
                'labels' => $t_labels,
                'hierarchical' => $taxonomy['hierarchical'] ?? true,
                'show_admin_column' => true,
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
