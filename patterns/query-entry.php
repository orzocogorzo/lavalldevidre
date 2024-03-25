<?php
/**
 * Title: Query entry
 * Slug: lavalldevidre/query-entry
 * Categories: query
 * Block Types: core/query
 * Viewport: 400px
 */
?>

<!-- wp:group {"tagName":"article","layout":{"type":"constrained"},"className":"query-entry"} -->
<article class="wp-block-group query-entry">
    <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","style":{"spacing":{"margin":{"bottom":"0"},"padding":{"bottom":"0"}}}} /-->
    <!-- wp:group {"style":{"spacing":{"blockGap":"0px","margin":{"top":"var:preset|spacing|10"},"padding":{"top":"0"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--10);padding-top:0">
        <!-- wp:post-title {"isLink":true,"style":{"layout":{"flexSize":"min(2.5rem, 3vw)","selfStretch":"fixed"}},"fontSize":"large"} /-->
        <!-- wp:template-part {"slug":"post-meta","theme":"lavalldevidre"} /-->
        <!-- wp:post-excerpt {"showMoreOnNewLine":false,"style":{"layout":{"flexSize":null,"selfStretch":"fit"}},"textColor":"contrast-2","fontSize":"small"} /-->
        <!-- wp:read-more /-->
    </div>
    <!-- /wp:group -->
</article>
<!-- /wp:group -->
