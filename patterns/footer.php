<?php
/**
 * Title: Footer with colophon, 4 columns
 * Slug: lavalldevidre/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"brand","textColor":"base","layout":{"type":"constrained","contentSize":""}} -->
<div
  class="wp-block-group has-base-color has-brand-background-color has-text-color has-background"
  style="
    margin-top: 0;
    margin-bottom: 0;
    padding-top: var(--wp--preset--spacing--50);
    padding-right: var(--wp--preset--spacing--40);
    padding-bottom: var(--wp--preset--spacing--50);
    padding-left: var(--wp--preset--spacing--40);
  "
>
  <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
  <div class="wp-block-group" style="padding-right: 0; padding-left: 0">
    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group">
      <!-- wp:columns {"align":"wide"} -->
      <div class="wp-block-columns alignwide">
        <!-- wp:column {"width":"40%"} -->
        <div class="wp-block-column" style="flex-basis: 40%">
          <!-- wp:group {"style":{"dimensions":{"minHeight":""},"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
          <div class="wp-block-group">
            <!-- wp:image {"id":414,"sizeSlug":"large","linkDestination":"none","className":"wp-block-site-logo"} -->
            <figure class="wp-block-image size-large wp-block-site-logo">
              <img
                src="https://lavalldevidre.cat/wp-content/uploads/2024/03/logotip-white-1024x144.png"
                alt=""
                class="wp-image-414"
              />
            </figure>
            <!-- /wp:image -->

            <!-- wp:site-tagline {"fontSize":"small"} /-->
          </div>
          <!-- /wp:group -->

          <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
          <div class="wp-block-group">
            <!-- wp:heading {"level":4} -->
            <h4 class="wp-block-heading">Privacitat</h4>
            <!-- /wp:heading -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group">
              <!-- wp:navigation {"ref":129,"textColor":"base","overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small"} /-->
            </div>
            <!-- /wp:group -->
          </div>
          <!-- /wp:group -->

          <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
          <div class="wp-block-group">
            <!-- wp:heading {"level":4} -->
            <h4 class="wp-block-heading">Xarxes socials</h4>
            <!-- /wp:heading -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group">
              <!-- wp:navigation {"ref":127,"textColor":"base","overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small"} /-->
            </div>
            <!-- /wp:group -->
          </div>
          <!-- /wp:group -->

          <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
          <div class="wp-block-group">
            <!-- wp:heading {"level":4} -->
            <h4 class="wp-block-heading">Amb el suport de</h4>
            <!-- /wp:heading -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div
              class="wp-block-group"
              style="padding-top: 0; padding-bottom: 0"
            >
              <!-- wp:image {"id":417,"width":"auto","height":"150px","sizeSlug":"full","linkDestination":"custom","className":"wp-block-partner-logo"} -->
              <figure
                class="wp-block-image size-full is-resized wp-block-partner-logo"
              >
                <a href="https://veinsdevallvidrera.blogspot.com"
                  ><img
                    src="https://lavalldevidre.cat/wp-content/uploads/2024/03/logo_associacio-white.png"
                    alt=""
                    class="wp-image-417"
                    style="width: auto; height: 150px"
                /></a>
              </figure>
              <!-- /wp:image -->

              <!-- wp:image {"id":958,"width":"auto","height":"120px","sizeSlug":"large","linkDestination":"none","className":"wp-block-site-logo"} -->
              <figure
                class="wp-block-image size-large is-resized wp-block-site-logo"
              >
                <img
                  src="https://lavalldevidre.cat/wp-content/uploads/2025/02/lavall_presidencia_blanc_c3.png"
                  alt=""
                  class="wp-image-958"
                  style="width: auto; height: 120px"
                />
              </figure>
              <!-- /wp:image -->
            </div>
            <!-- /wp:group -->
          </div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"10%"} -->
        <div class="wp-block-column" style="flex-basis: 10%"></div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"50%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
        <div
          class="wp-block-column"
          style="padding-top: 0; padding-bottom: 0; flex-basis: 50%"
          id="contacte"
        >
          <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
          <div class="wp-block-group" style="padding-top: 0; padding-bottom: 0">
            <!-- wp:heading -->
            <h2 class="wp-block-heading">Contacta'ns</h2>
            <!-- /wp:heading -->

            <!-- wp:contact-form-7/contact-form-selector {"id":165,"hash":"674f8e5","title":"Contacte"} -->
            <div class="wp-block-contact-form-7-contact-form-selector">
              [contact-form-7 id="674f8e5" title="Contacte"]
            </div>
            <!-- /wp:contact-form-7/contact-form-selector -->
          </div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
      </div>
      <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
