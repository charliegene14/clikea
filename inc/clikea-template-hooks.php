<?php
/**
 * WooCommerce Templates hooks
 */
add_action('woocommerce_before_shop_loop_item_title', 'badge_new_product');

/**
 * Clikea Navigation Template
 */

add_action('clikea-navigation', 'clikea_nav_wrap_start');

add_action('clikea-navigation', 'clikea_main_nav_wrap_start');
add_action('clikea-navigation', 'clikea_main_nav_content');
add_action('clikea-navigation', 'clikea_main_nav_wrap_end');

add_action('clikea-navigation', 'clikea_shop_nav_wrap_start');
add_action('clikea-navigation', 'clikea_shop_nav_content');
add_action('clikea-navigation', 'clikea_shop_nav_wrap_end');

add_action('clikea-navigation', 'clikea_nav_wrap_end');

