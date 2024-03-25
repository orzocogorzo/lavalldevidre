<?php

require_once 'includes/model-article.php';
require_once 'includes/model-publication.php';
require_once 'includes/model-advertiser.php';

add_action('wp_enqueue_scripts', 'vdv_enqueue_scripts');
function vdv_enqueue_scripts()
{
    $theme = wp_get_theme();
    $parent = $theme->parent();

    wp_enqueue_style(
        $parent->get_stylesheet(),
        $parent->get_stylesheet_directory_uri() . '/style.css',
        [],
        $parent->get('Version')
    );

    wp_enqueue_style(
        $theme->get_stylesheet(),
        $theme->get_stylesheet_directory_uri() . '/style.css',
        [$parent->get_stylesheet()],
        $theme->get('Version')
    );

    wp_enqueue_script(
        $theme->get_stylesheet(),
        $theme->get_stylesheet_directory_uri() . '/assets/js/index.js',
        [$parent->get_stylesheet()],
        $theme->get('Version'),
    );
}

add_action('after_setup_theme', 'wpct_add_theme_support');
function wpct_add_theme_support()
{
    // Add editor-style.css
    add_editor_style('assets/css/index.css');
}

add_action('pre_get_posts', 'tg_include_custom_post_types_in_archive_pages');
function tg_include_custom_post_types_in_archive_pages($query)
{
    if ($query->is_main_query() && ! is_admin() && (is_category() || is_tag() && empty($query->query_vars['suppress_filters']))) {
        $query->set('post_type', ['post', 'advertiser', 'publication', 'article']);
    }
}
