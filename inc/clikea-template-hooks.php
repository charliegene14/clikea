<?php
/**
 * WooCommerce Templates hooks
 */
add_action('woocommerce_before_shop_loop_item_title',   'badge_new_product');
add_action('woocommerce_before_shop_loop_item_title',   'badge_out_of_stock');
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );

/**
 * Clikea some specifics templates
 */
add_action('clikea_wc_shop_loop_subcategory_title', 'clikea_wc_shop_loop_subcategory_title');
add_action('clikea_before_category_title',          'clikea_product_category_thumbnail');

/**
 * Clikea Navigation Template
 */



add_action('clikea-navigation', 'clikea_nav_wrap_start');

add_action('clikea-navigation', 'clikea_main_nav_wrap_start');
add_action('clikea-navigation', 'clikea_main_nav_content');
add_action('clikea-navigation', 'clikea_main_nav_wrap_end');

add_action('clikea-navigation', 'clikea_shop_nav_wrap_start');
add_action('clikea-navigation', 'clikea_shop_nav_left');
add_action('clikea-navigation', 'clikea_shop_nav_right');
add_action('clikea-navigation', 'clikea_shop_nav_wrap_end');

add_action('clikea-navigation', 'clikea_nav_wrap_end');