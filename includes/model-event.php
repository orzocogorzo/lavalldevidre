<?php

add_action('init', 'vdv_event_model');
function vdv_event_model()
{
    register_post_type(
        'event',
        [
            'labels' => [
                'name' => __('Agenda', 'vdv'),
                'singular_name' => __('Esdeveniment', 'vdv')
            ],

            // Frontend
            'has_archive' => true,
            'public' => true,
            'publicly_queryable' => true,

            // Admin
            'capability_type' => 'post',
            'menu_icon' => 'dashicons-calendar-alt',
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
                'slug' => 'agenda'
            ],
            'taxonomies' => [],
            // 'map_meta_cap' => true,
            // 'capabilities' => [],
            // 'map_meta_cap' => true
        ]
    );
}

add_action('rest_api_init', function () {
    register_rest_field(
        'event',
        'start_date',
        [
            'get_callback' => function ($data) {
                $value = get_field('start_date', $data['id']);
                return $value;
            }
        ]
    );

    register_rest_field(
        'event',
        'end_date',
        [
            'get_callback' => function ($data) {
                $value = get_field('end_date', $data['id']);
                return $value;
            }
        ]
    );

    register_rest_field(
        'event',
        'external_url',
        [
            'get_callback' => function ($data) {
                $value = get_field('external_url', $data['id']);
                return $value;
            }
        ]
    );
});
