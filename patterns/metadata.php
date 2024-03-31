<?php
/**
 * Title: Metadades de l'entrada
 * Slug: vdv/metadata-entry
 * Categories: query
 * Block Types: core/query
 * Viewport: 400px
 */
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:group {"style":{"spacing":{"blockGap":"0.3em"}},"layout":{"type":"flex","justifyContent":"left"}} -->
    <div class="wp-block-group">
        <!-- wp:post-date {"format":"M j, Y","isLink":true} /-->

        <!-- wp:paragraph {"textColor":"contrast-2"} -->
        <p class="has-contrast-2-color has-text-color">—</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"textColor":"contrast-2","fontSize":"small"} -->
        <p class="has-contrast-2-color has-text-color has-small-font-size">per</p>
        <!-- /wp:paragraph -->

        <!-- wp:vdv/custom-field {"custom_field":"author","className":"wp-block-group is-content-justification-left is-layout-flex wp-container-core-group-layout-5 wp-block-group-is-layout-flex"} -->
        <div class="wp-block-vdv-custom-field wp-block-group is-content-justification-left is-layout-flex wp-container-core-group-layout-5 wp-block-group-is-layout-flex">
            <!-- wp:paragraph {"placeholder":"Setup your custom field template","fontSize":"small"} -->
            <p class="has-small-font-size">
                <strong>_author_</strong>
            </p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:vdv/custom-field -->

        <!-- wp:post-terms {"term":"category","prefix":"en "} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
