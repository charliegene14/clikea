<?php

add_action  ('after_setup_theme',   'clikea_theme_supports');
add_action  ('wp_enqueue_scripts',  'clikea_register_styles');

add_filter  ('mime_types',          'webp_upload_mimes');