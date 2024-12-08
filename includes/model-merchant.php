<?php

add_action('init', 'vdv_merchant_model');
function vdv_merchant_model()
{
    register_post_type(
        'merchant',
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
            'menu_icon' => 'dashicons-store',
            'menu_position' => 28,
            'query_var' => true,
            'show_in_menu' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'supports' => [
                'title',
                'thumbnail',
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
