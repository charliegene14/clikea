<?php

add_action  ('after_setup_theme',   'clikea_theme_supports');
add_action  ('wp_enqueue_scripts',  'clikea_register_styles');

// remove_action   ('woocommerce_before_shop_loop',    'woocommerce_result_count', 20);