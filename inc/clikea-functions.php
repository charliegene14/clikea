<?php

/**
 * Theme Supports
 */
function clikea_theme_supports() {

    add_theme_support   ('title-tag');
    add_theme_support   ('menus');
    add_theme_support   ('woocommerce', array(
        'product_grid' => array(
            'default_rows'    => 2,
            'min_rows'        => 1,
            'max_rows'        => 4,
            'default_columns' => 2,
            'min_columns'     => 1,
            'max_columns'     => 4,
        ),
    ) );
    add_theme_support   ('widgets');
    add_theme_support   ('wc-product-gallery-slider');
}

/**
 * Register theme menus
 */
function clikea_register_menus() {
    register_nav_menus(
        array(
            'shop-menu' => __('Shop Navigation'),
            'left-main-menu' => __('Left Main Navigation'),
            'right-main-menu' => __('Right Main Navigation'),
            'user-connected-menu' => __('Connected User Navigation'),
            'user-disconnected-menu' => __('Disconnected User Navigation'),
        )
    );
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
 * Allow WebP images uploads
 */
function webp_upload_mimes($existing_mimes) {

    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}