<?php

add_action('init', 'vdv_article_model');
function vdv_article_model()
{
    register_post_type(
        'article',
        [
            'labels' => [
                'name' => __('Articles', 'vdv'),
                'singular_name' => __('Article', 'vdv')
            ],

            // Frontend
            'has_archive' => true,
            'public' => true,
            'publicly_queryable' => true,

            // Admin
            'capability_type' => 'post',
            'menu_icon' => 'dashicons-admin-home',
            'menu_position' => 28,
            'query_var' => true,
            'show_in_menu' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'supports' => [
                'title',
                'thumbnail',
                'excerpt',
                'editor',
                'author',
            ],
            'rewrite' => [
                'slug' => 'articles'
            ],
            'taxonomies' => ['category', 'post_tag']
            // 'map_meta_cap' => true,
            // 'capabilities' => [],
            // 'map_meta_cap' => true
        ]
    );
}
