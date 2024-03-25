<?php
/**
 * Title: Advertiser contact
 * Slug: lavalldevidre/advertiser-contact
 * Categories: acf
 * Viewport: 860px
 *
 */

$webpage = get_field('webpage');
$email = get_field('email');
$phone = get_field('phone');
$address = get_field('address');

?>

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"}},"className":"advertiser-contact"} -->
<div class="wp-block-group advertiser-contact">
    <?php if ($webpage) : ?>
    <!-- wp:paragraph -->  
    <p><a href="<?= $webpage ?>"><?= $webpage ?></a></p>
    <!-- /wp:paragraph -->
    <?php else : ?>
    <!-- wp:paragraph {"lock":{"move":true,"remove":true}} -->
    <p>Pàgina web</p>
    <!-- /wp:paragraph -->
    <?php endif; ?>
    <?php if ($mail) : ?>
    <!-- wp:paragraph -->  
    <p><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
    <!-- /wp:paragraph -->
    <?php else : ?>
    <!-- wp:paragraph -->
    <p>Correu electrònic</p>
    <!-- /wp:paragraph -->
    <?php endif; ?>
    <?php if ($address) : ?>
    <!-- wp:paragraph -->  
    <p><address><?= $address ?></address></p>
    <!-- /wp:paragraph -->
    <?php else : ?>
    <!-- wp:paragraph -->
    <p>Adreça</p>
    <!-- /wp:paragraph -->
    <?php endif; ?>
</div>
<!-- /wp:group -->

