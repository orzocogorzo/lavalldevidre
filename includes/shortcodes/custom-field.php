<?php

add_shortcode('vdv_custom_field', function ($atts, $content) {
    if (!isset($atts['fields']) || empty($atts['fields'])) {
        return '';
    }
    
    $fields = array_map(function ($field) {
        return trim($field);
    }, explode(',', $atts['fields']));

    $post_id = get_the_ID();
    $meta = [];
    foreach ($fields as $field) {
        $meta[$field] = get_post_meta($post_id, $field, true);
    }

    if (empty($meta)) {
        return '';
    }

    try {
        for ($i = 0; $i < count($fields); $i++) {
            $field = $fields[$i];
            $value = $meta[$field];
            $content = preg_replace('/_' . preg_quote($field, '/') . '_/', $value, $content);
        }

        return $content;
    } catch (ValueError $e) {
        return $e->getMessage();
    }
});
