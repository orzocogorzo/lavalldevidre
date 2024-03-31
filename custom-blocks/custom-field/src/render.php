<?php
/**
* Dynamic Block Template.
* @param   array $attributes - A clean associative array of block attributes.
* @param   array $block - All the block settings and attributes.
* @param   string $content - The block inner HTML (usually empty unless using inner blocks).
*/

$is_remote_frontend = shortcode_exists('vdv_custom_field');
$field = $attributes['custom_field'];

if ($is_remote_frontend) {
    echo do_shortcode("[vdv_custom_field fields='{$field}']{$content}[/vdv_custom_field]");
} else {
    echo $content;
}
