<?php

require_once 'includes/model-article.php';
require_once 'includes/model-publication.php';
require_once 'includes/model-merchant.php';
require_once 'includes/model-event.php';

require_once 'includes/shortcodes/merchant-contact.php';
require_once 'includes/shortcodes/custom-field.php';

require_once 'includes/acf.php';

require_once 'custom-blocks/pdf-reader/pdf-reader.php';
require_once 'custom-blocks/custom-field/custom-field.php';

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

    // wp_enqueue_script(
    //     $theme->get_stylesheet(),
    //     $theme->get_stylesheet_directory_uri() . '/assets/js/index.js',
    //     [$parent->get_stylesheet()],
    //     $theme->get('Version'),
    // );

    if (is_archive() && get_post_type() === 'event') {
        wp_enqueue_script(
            'fullcalendar',
            'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js',
            [],
            '6.1.11',
        );

        wp_enqueue_script(
            'fullcalendar-ca',
            $theme->get_stylesheet_directory_uri() . '/assets/js/ca.global.min.js',
            [],
            '6.1.11'
        );

        $script_slug = $theme->get_stylesheet() . '-agenda';
        wp_enqueue_script(
            $script_slug,
            $theme->get_stylesheet_directory_uri() . '/assets/js/agenda.js',
            ['fullcalendar', 'fullcalendar-ca'],
            $theme->get('Version'),
        );

        wp_localize_script(
            $script_slug,
            'vdvAgendaSettings',
            [
                'endpoint' => get_rest_url(null, 'wp/v2/event'),
            ]
        );
    }
}

add_action('after_setup_theme', 'vdv_add_theme_support');
function vdv_add_theme_support()
{
    // Add editor-style.css
    add_editor_style('assets/css/editor-style.css');
}

add_action('pre_get_posts', 'tg_include_custom_post_types_in_archive_pages');
function tg_include_custom_post_types_in_archive_pages($query)
{
    if ($query->is_main_query() && ! is_admin() && (is_category() || is_tag() && empty($query->query_vars['suppress_filters']))) {
        $query->set('post_type', ['post', 'merchant', 'publication', 'article']);
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

add_action('pre_get_posts', function ($query) {
    if (!$query->is_main_query() && !is_admin() && isset($query->query_vars['post_type']) && $query->query_vars['post_type'] === 'merchant') {
        $query->set('orderby', 'rand');
    }
});

add_action('init', 'vdv_custom_block_styles');
function vdv_custom_block_styles()
{
    $styles = [
        'core/group' => [
            'hidden' => __('Hidden', 'vdv'),
            'show-mobile' => __('ShowOn Mobile', 'vdv'),
            'show-mobile-tablet' => __('ShowOn Mobile-Tablet', 'vdv'),
            'show-tablet' => __('ShowOn Tablet', 'vdv'),
            'show-tablet-desktop' => __('ShowOn Tablet-Desktop', 'vdv'),
            'show-desktop' => __('ShowOn Desktop', 'vdv'),
        ],
        'core/column' => [
            'hidden' => __('Hidden', 'vdv'),
            'show-mobile' => __('ShowOn Mobile', 'vdv'),
            'show-mobile-tablet' => __('ShowOn Mobile-Tablet', 'vdv'),
            'show-tablet' => __('ShowOn Tablet', 'vdv'),
            'show-tablet-desktop' => __('ShowOn Tablet-Desktop', 'vdv'),
            'show-desktop' => __('ShowOn Desktop', 'vdv')
        ],
        'core/spacer' => [
            'hidden' => __('Hidden', 'vdv'),
            'show-mobile' => __('ShowOn Mobile', 'vdv'),
            'show-mobile-tablet' => __('ShowOn Mobile-Tablet', 'vdv'),
            'show-tablet' => __('ShowOn Tablet', 'vdv'),
            'show-tablet-desktop' => __('ShowOn Tablet-Desktop', 'vdv'),
            'show-desktop' => __('ShowOn Desktop', 'vdv')
        ],
        'core/columns' => [
            'hidden' => __('Hidden', 'vdv'),
            'show-mobile' => __('ShowOn Mobile', 'vdv'),
            'show-mobile-tablet' => __('ShowOn Mobile-Tablet', 'vdv'),
            'show-tablet' => __('ShowOn Tablet', 'vdv'),
            'show-tablet-desktop' => __('ShowOn Tablet-Desktop', 'vdv'),
            'show-desktop' => __('ShowOn Desktop', 'vdv')
        ]

    ];

    foreach ($styles as $block => $style) {
        foreach ($style as $name => $label) {
            register_block_style(
                $block,
                [
                    'name' => $name,
                    'label' => $label
                ]
            );
        }
    }
}

add_action('admin_menu', 'vdv_reusable_blocks_admin_menu');
function vdv_reusable_blocks_admin_menu()
{
    add_menu_page(
        'Blocs Reutilitzables',
        'Blocs Reutilitzables',
        'edit_posts',
        'edit.php?post_type=wp_block',
        '',
        'dashicons-editor-table',
        22
    );
}

add_filter('rest_event_query', function ($args, $request) {
    $args['meta_query'] = [
        [
            'key' => 'start_date',
            'value' => str_replace('-', '', $request['start_date']),
            'compare' => '>=',
        ],
        [
            'key' => 'end_date',
            'value' => str_replace('-', '', $request['end_date']),
            'compare' => '<=',
        ]
    ];
    return $args;
}, 10, 2);

add_filter('excerpt_length', function () {
    return 28;
});

add_filter('admin_menu', function () {
    remove_menu_page('edit.php?post_type=event');
});

# SMTP
add_action('admin_init', function () {
    add_settings_section(
        'vdv-smtp',
        __('SMTP email sending', 'vdv'),
        function () {
            echo __(
                'Configure WP to send emails through your SMTP server',
                'vdv'
            );
        },
        'general'
    );

    add_settings_field(
        'vdv-smtp',
        __('Credentials', 'vdv'),
        'vdv_smtp_credentials',
        'general',
        'vdv-smtp'
    );

    register_setting('general', 'vdv-smtp', [
        'type' => 'object',
        'show_in_rest' => false,
        'default' => [
            'enabled' => false,
            'host' => '',
            'port' => '',
            'secure' => '',
            'username' => '',
            'password' => '',
            'from' => '',
        ],
    ]);
});

function vdv_smtp_credentials()
{
    $value = (array) get_option('vdv-smtp', []);

    echo '<fieldset style="width:fit-content">';
    echo '<legend class="screen-reader-text"><span>Credencials SMTP</span></legend>';
    vdv_smtp_field('checkbox', 'enabled', (bool) $value['enabled']);
    vdv_smtp_field('text', 'host', $value['host']);
    vdv_smtp_field('text', 'port', $value['port']);
    vdv_smtp_field('select', 'secure', $value['secure'], ['tls', 'ssl']);
    vdv_smtp_field('text', 'username', $value['username']);
    vdv_smtp_field('password', 'password', $value['password']);
    vdv_smtp_field('text', 'from', $value['from']);
    echo '</fieldset>';
}

function vdv_smtp_field($type, $name, $value, $options = [])
{
    $label = __($name, 'vdv');
    echo "<label style='display:flex;justify-content:space-between;width:100%'><b style='margin-right:1em'>{$label}</b>";
    if ($type === 'select') {
        $options =
            '<option></option>' .
            implode(
                '',
                array_map(function ($opt) use ($value) {
                    $label = __($opt, 'vdv');
                    $selected = $value === $opt ? 'selected' : '';
                    return "<option value='{$opt}' {$selected}>{$label}</option>";
                }, $options)
            );
        echo "<select id='vdv-smtp[{$name}]' name='vdv-smtp[{$name}]' style='width:196px'>{$options}</select>";
    } elseif ($type === 'checkbox') {
        $checked = $value ? 'checked' : '';
        echo "<input type='checkbox' name='vdv-smtp[{$name}]' id='vdv-smtp[{$name}]' {$checked} />";
    } else {
        echo "<input type='{$type}' name='vdv-smtp[{$name}]' id='vdv-smtp[{$name}]' value='{$value}' />";
    }
    echo '</label><br />';
}

add_action('phpmailer_init', function ($phpmailer) {
    $smtp = (array) get_option('vdv-smtp', []);
    if (!$smtp['enabled']) {
        return;
    }

    if (
        !(
            $smtp['host'] &&
            $smtp['port'] &&
            $smtp['secure'] &&
            $smtp['username'] &&
            $smtp['password']
        )
    ) {
        return;
    }

    extract($smtp);
    $phpmailer->isSMTP();
    $phpmailer->Host = $host;
    $phpmailer->Port = (int) $port;
    $phpmailer->SMTPSecure = $secure;
    $phpmailer->SMTPAuth = true;
    $phpmailer->Username = $username;
    $phpmailer->Password = $password;
    $phpmailer->From = $username;
    if (!empty($from)) {
        $phpmailer->FromName = $from;
        $phpmailer->addReplyTo($username, $from);
    }
});
