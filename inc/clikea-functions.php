<?php

/**
 * Theme Supports
 */
function clikea_theme_supports() {

    add_theme_support   ('title-tag');
    add_theme_support   ('menus');
    add_theme_support   ('woocommerce');
    add_theme_support   ('widgets');
    add_theme_support   ('wc-product-gallery-slider');
}

/**
 * Register Styles
 */
function clikea_register_styles() {

    wp_register_style   ('clikea',  '/wp-content/themes/clikea/style.css');
    wp_register_script  ('clikea-scripts', '/wp-content/themes/clikea/assets/js/shop-navigation.js', 0, 0, true);

    wp_enqueue_style    ('clikea');
    wp_enqueue_script   ('clikea-scripts');
}

/**
 * Allowing WebP images uploads
 */
function webp_upload_mimes($existing_mimes) {

    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}