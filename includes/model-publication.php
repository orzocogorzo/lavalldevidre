<?php

add_action('init', 'vdv_publication_model');
function vdv_publication_model()
{
    register_post_type(
        'publication',
        [
            'labels' => [
                'name' => __('Publicacions', 'vdv'),
                'singular_name' => __('Publicació', 'vdv')
            ],

            // Frontend
            'has_archive' => true,
            'public' => true,
            'publicly_queryable' => true,

            // Admin
            'capability_type' => 'post',
            'menu_icon' => 'dashicons-book',
            'menu_position' => 28,
            'query_var' => true,
            'show_in_menu' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'supports' => [
                'title',
                'thumbnail',
                'excerpt',
            ],
            'rewrite' => [
                'slug' => 'publicacions'
            ],
            'taxonomies' => ['post_tag', 'category']
            // 'map_meta_cap' => true,
            // 'capabilities' => [],
            // 'map_meta_cap' => true
        ]
    );
}
