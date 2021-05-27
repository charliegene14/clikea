<?php

add_action('cart-navigation', 'clikea_cart_navigation');

add_action('woocommerce_before_shop_loop_item_title', 'badge_new_product');