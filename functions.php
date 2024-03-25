<?php

require_once 'includes/model-article.php';
require_once 'includes/model-publication.php';
require_once 'includes/model-advertiser.php';

require_once 'includes/shortcodes/advertiser-contact.php';

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

add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

add_action('init', 'vdv_acf_pattern_categories');
function vdv_acf_pattern_categories()
{
    register_block_pattern_category('acf', [
        'label' => __('ACF', 'vdv')
    ]);
}

add_action('pre_get_posts', function ($query) {
    if (!$query->is_main_query() && !is_admin() && $query->query_vars['post_type'] === 'advertiser') {
        $query->set('orderby', 'rand');
        // $query->query_vars['orderby'] = 'rand';
    }
});
