<?php

/** CPTS **/
function create_posttype()
{
    global $cpt_project;
    register_custom_post_type($cpt_project);
}

$cpt_project = [
    'name' => __('Projet', 'nv_core'),
    'slug' => 'project',
    'menu_icon' => 'dashicons-portfolio',
    'menu_position' => 5,
    'rewrite' => ['slug' => 'projects'],
    'labels' => [
        'name' => __('Projets', 'nv_core'),
        'singular_name' => __('Projet', 'nv_core'),
        'menu_name' => __('Projets', 'nv_core'),
        'add_new' => __('Ajouter un projet', 'nv_core'),
        'add_new_item' => __('Ajouter un nouveau projet', 'nv_core'),
        'new_item' => __('Nouveau projet', 'nv_core'),
        'edit_item' => __('Modifier le projet', 'nv_core'),
        'view_item' => __('Voir le projet', 'nv_core'),
        'search_items' => __('Rechercher un projet', 'nv_core'),
        'not_found' => __('Aucun projet trouvé', 'nv_core'),
        'all_items' => __('Tous les projets', 'nv_core'),
    ],
    'supports' => ['title', 'thumbnail', 'editor', 'excerpt'],
];

function register_custom_post_type($post_type)
{
    $name = $post_type['name'];
    $labels = isset($post_type['labels']) ? $post_type['labels'] :
        [
            'name' => $name . 's',
            'singular_name' => $name,
            'menu_name' => $name . 's',
            'add_new' => __('Ajouter un élément', 'nv_core'),
            'add_new_item' => __('Ajouter un nouvel élément', 'nv_core'),
            'new_item' => __('Nouvel élément', 'nv_core'),
            'edit_item' => __('Modifier un élément', 'nv_core'),
            'view_item' => __('Voir l\'élément', 'nv_core'),
            'search_items' => __('Rechercher un élément', 'nv_core'),
            'not_found' => __('Aucun élément trouvé', 'nv_core'),
            'all_items' => __('Tous les éléments', 'nv_core'),
        ];

    $args = [
        'label' => $name,
        'labels' => $labels,
        'publicly_queryable' => isset($post_type['publicly_queryable']) ? $post_type['publicly_queryable'] : false,
        'menu_icon' => isset($post_type['menu_icon']) ? $post_type['menu_icon'] : 'dashicons-admin-post',
        'has_archive' => isset($post_type['has_archive']) ? $post_type['has_archive'] : false,
        'show_in_nav_menus' => isset($post_type['show_in_nav_menus']) ? $post_type['show_in_nav_menus'] : false,
        'rewrite' => isset($post_type['rewrite']) ? $post_type['rewrite'] : true,
        'supports' => isset($post_type['supports']) ? $post_type['supports'] : ['title', 'thumbnail'],
        'public' => isset($post_type['public']) ? $post_type['public'] : true,
        'show_ui' => true,
        'menu_position' => isset($post_type['menu_position']) ? $post_type['menu_position'] : 10,
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
                    'all_items' => __('Tous les termes', 'nv_core'),
                    'edit_item' => __('Éditer le terme', 'nv_core'),
                    'view_item' => __('Voir le terme', 'nv_core'),
                    'update_item' => __('Mettre à jour le terme', 'nv_core'),
                    'add_new_item' => __('Ajouter un terme', 'nv_core'),
                    'new_item_name' => __('Nouveau terme', 'nv_core'),
                    'search_items' => __('Rechercher parmi les termes', 'nv_core'),
                    'popular_items' => __('Termes les plus utilisés', 'nv_core'),
                ];

            $t_args = [
                'label' => $t_name,
                'labels' => $t_labels,
                'show_admin_column' => true,
                'hierarchical' => isset($taxonomy['hierarchical']) ? $taxonomy['hierarchical'] : true,
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
