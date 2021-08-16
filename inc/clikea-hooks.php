<?php

add_action  ('init',                'clikea_register_menus');
add_action  ('after_setup_theme',   'clikea_theme_supports');
add_action  ('wp_enqueue_scripts',  'clikea_register_styles');
add_action  ('admin_menu',          'clikea_home_menu');
add_action  ('admin_init',          'clikea_home_settings');

add_filter  ('mime_types',          'webp_upload_mimes');