<?php

add_shortcode('merchant_contact', function () {

    $webpage = get_field('webpage');
    $email = get_field('email');
    $phone = get_field('phone');
    $mobile = get_field('mobile');
    $address = get_field('address');

    ob_start();
    ?>

<div class="wp-block-group merchant-contact is-layout-flow wp-container-core-group-layout-5 wp-block-group-is-layout-flow">
    <?php if ($email) : ?>
    <p style="margin: 0;"><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
    <?php endif; ?>
    <?php if ($phone) : ?>
    <p style="margin: 0;"><?= $phone ?></p>
    <?php endif; ?>
    <?php if ($mobile) : ?>
    <p style="margin: 0;"><?= $mobile ?></p>
    <?php endif; ?>
    <?php if ($address) : ?>
    <p style="margin-bottom: 0;"><label><b>Adreça</b></label><br /><span style="display:block;line-height:1;"><?= $address ?></span></p>
    <?php endif; ?>
    <?php if ($webpage) : ?>
    <p style="margin-bottom: 0;"><label><b>Pàgina web</b></label><a href="<?= $webpage ?>"><span style="display:block;line-height:1;"><?= $webpage ?></span></a></p>
    <?php endif; ?>
</div>

<?php
    return ob_get_clean();
});
