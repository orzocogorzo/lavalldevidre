<?php

/**
* Dynamic Block Template.
* @param   array $attributes - A clean associative array of block attributes.
* @param   array $block - All the block settings and attributes.
* @param   string $content - The block inner HTML (usually empty unless using inner blocks).
*/

$post = get_post();
$tags = wp_get_post_terms($post->ID, 'post_tag');

$args = array(
  'post_type' => 'article',
  'post_status' => 'publish',
  'posts_per_page' => $attributes['posts'] ?? 3,
  'post__not_in' => array( $post->ID ),
);

if (!empty($tags)) {
    $args['tax_query'] = array(
        'relation' => 'OR',
    );

    foreach ($tags as $tag) {
        $args['tax_query'][] = array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => $tag->slug,
        );
    }
}

$query = new WP_Query($args);
if ($query->have_posts()) { ?>
<div class="wp-block-vdv-related-articles">
<h2 class="wp-block-heading" style="margin: 2em 0 1em">Articles relacionats</h2>
<div class="wp-block-columns is-layout-flex">
    <?php
    while ($query->have_posts()) {
        $query->the_post(); ?>
<div class="wp-block-column is-layout-flex wp-block-column-is-layout-flex is-vertically-aligned-top" style="max-width: 50%">
  <article class="wp-block-group query-entry has-global-padding is-layout-constrained wp-block-group-is-layout-constrained">
    <figure style="aspect-ratio:4/3; padding-bottom:0;margin-bottom:0;" class="wp-block-post-featured-image">
      <a href="<?php echo get_the_permalink(); ?>">
          <?php echo get_the_post_thumbnail($related, 'full', array('style' => 'border-radius:0;width:100%;height:100%;object-fit:cover')); ?>
      </a>
    </figure>
    <div class="wp-block-group is-vertical is-nowrap is-layout-flex wp-block-group-is-layout-flex" style="margin-top:var(--wp--preset--spacing--10);padding-top:0;gap:0">
      <h3 style="font-style:normal;font-weight:700;text-transform:none; margin-bottom:var(--wp--preset--spacing--10);font-size:var(--wp--preset--font-size--x-large) !important" class="has-link-color wp-elements-28e33564502988180695d4b4e7404974 wp-block-post-title has-large-font-size wp-container-content-32e3a40d">
        <a style="color:var(--wp--preset--color--typography)" href="<?php echo get_the_permalink(); ?>" target="_self"><?php echo get_the_title(); ?></a>
      </h3>
      <div class="wp-block-post-excerpt" style="padding-right:0;padding-left:0;padding-top:0;padding-bottom:0;margin-top:var(--wp--preset--spacing--10);margin-bottom:var(--wp--preset--spacing--10);">
        <p class="wp-block-post-excerpt__excerpt" style="margin-bottom: 0"><?php echo get_the_excerpt(); ?></p>
      </div>
    </div>
  </article>
</div><?php
    } ?></div></div><?php
}

wp_reset_postdata();

wp_enqueue_style('wp-block-columns');
wp_enqueue_style('wp-block-column');
wp_enqueue_style('wp-block-post-featured-image');
wp_enqueue_style('wp-block-post-title');

