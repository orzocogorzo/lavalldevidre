<?php

add_action('init', 'vdv_advertiser_model');
function vdv_advertiser_model()
{
    register_post_type(
        'advertiser',
        [
            'labels' => [
                'name' => __('Anunciants', 'vdv'),
                'singular_name' => __('Anunciant', 'vdv')
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
                'editor',
            ],
            'rewrite' => [
                'slug' => 'anunciants'
            ],
            'taxonomies' => ['post_tag', 'category']
            // 'map_meta_cap' => true,
            // 'capabilities' => [],
            // 'map_meta_cap' => true
        ]
    );
}
