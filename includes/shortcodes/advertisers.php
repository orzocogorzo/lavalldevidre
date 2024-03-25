<?php

add_shortcode('advertisers', function ($atts) {
    $count = isset($atts['count']) ? $atts['count'] : 3;
    $query = new WP_Query([
        'post_type' => 'advertiser',
        'posts_per_page' => $count,
        'orderby' => 'rand'
    ]);

    global $post;
    $global = $post;

    ob_start();

    ?>
    <ul class="columns-3 alignfull wp-block-post-template is-layout-grid wp-container-core-post-template-layout-2 wp-block-post-template-is-layout-grid" style="grid-template-columns: repeat(3, minmax(0, 1fr));gap: var(--wp--preset--spacing--30);">

    <?php
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        ?>
        <li class="wp-block-post post-<?= $post_id ?> advertiser type-advertiser status-publish has-post-thumbnail hentry">
            <figure
                style="aspect-ratio:4/3; padding-bottom:var(--wp--preset--spacing--20);margin-bottom:0;"
                class="wp-block-post-featured-image"
            >
                <a href="<?= get_permalink($post_id) ?>" target="_self"><?= get_the_post_thumbnail($post_id, 'small') ?></a>
            </figure>
        </li>
        <?php
        $post = $global;
        wp_reset_postdata();
    }
    ?>
    </ul>
    <?php

    return ob_get_clean();
});
