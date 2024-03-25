<?php
/**
 * Title: Publication query entry
 * Slug: lavalldevidre/publication-query-entry
 * Categories: query
 * Block Types: core/query
 * Viewport: 400px
 */
?>

<!-- wp:group {"tagName":"article","layout":{"type":"default"},"className":"query-entry publication-query-entry"} -->
<article class="wp-block-group query-entry publication-query-entry">
    <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4","scale":"contain","style":{"spacing":{"margin":{"bottom":"0"},"padding":{"bottom":"var:preset|spacing|20"}},"border":{"width":"0px","style":"none"},"color":{"duotone":"unset"}}} /-->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"0"},"blockGap":"0px"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
    <div class="wp-block-group" style="margin-top:0;padding-top:0">
        <!-- wp:post-title {"isLink":true,"style":{"layout":{"flexSize":"min(2.5rem, 3vw)","selfStretch":"fixed"}},"fontSize":"large"} /-->
        <!-- wp:template-part {"slug":"post-meta","theme":"lavalldevidre"} /-->
    </div>
    <!-- /wp:group -->
</article>
<!-- /wp:group -->
