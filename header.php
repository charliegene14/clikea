<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php wp_head(); ?>
</head>

<body
<?php body_class(); if (is_front_page()): ?>
    style="background: url('<?php echo get_option('clikea_home_background') ? wp_get_attachment_url(get_option('clikea_home_background')) : '/wp-content/themes/clikea/assets/img/default_background.png' ?>') no-repeat"
<?php endif; ?>
>


<?php do_action('clikea-navigation'); ?>