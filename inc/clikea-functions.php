<?php

/**
 * Home Collection theme option page
 */

function clikea_home_settings() {

    register_setting(   'clikea-home-page', 'clikea_home_btn_text', ['default' => 'Welcome home !']);
    register_setting(   'clikea-home-page', 'clikea_home_btn_url', ['default' => get_option('siteurl')]);
    register_setting(   'clikea-home-page', 'clikea_home_background', );
}

function clikea_home_menu() {
    add_submenu_page(   'themes.php',
                        'Clikea Home Page',
                        'Clikea Home Page',
                        'manage_options',
                        'clikea-home-page',
                        'home_page_menu_render' );
}

function home_page_menu_render() {
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">Clikea home page managing</h1>
        <p>Here manage your website home page.</p>

        <form action="options.php" method="post">
            <table class="form-table" role="presentation">
                <tbody>
                    <tr class="form-field">
                        <th scope="row" >
                            <label>Button text</label>
                        </th>
                        <td>
                            <input type="text" name="clikea_home_btn_text" value="<?= get_option('clikea_home_btn_text'); ?>" />
                        </td>
                    </tr>

                    <tr class="form-field">
                        <th scope="row" >
                            <label>Button URL</label>
                        </th>
                        <td>
                            <input type="text" name="clikea_home_btn_url" value="<?= get_option('clikea_home_btn_url'); ?> "/>
                        </td>
                    </tr>

                    <tr class="form-field">
                        <th scope="row" valign="top">
                            <label>Background picture</label>
                        </th>
                        <td>

                            <div id="clikea_home_background_picture" style="float: left; margin-right: 10px;">
                                <?php
                                if (get_option('clikea_home_background')) {
                                    echo wp_get_attachment_image(get_option('clikea_home_background'));
                                } else {
                                    echo '<img src="/wp-content/themes/clikea/assets/img/clikea-placeholder.png" style="width: 150px; height: 150px;" />';
                                }
                                ?>
                            </div>
                            <div style="line-height: 60px;">
                                <input type="hidden" id="clikea_home_background" name="clikea_home_background" value="<?= get_option('clikea_home_background') ?>">
                                <button type="button" class="upload_image_button button">Téléverser/Ajouter image</button>
                                <button type="button" class="remove_image_button button">Supprimer image</button>
                            </div>

                <script type="text/javascript">
					// Only show the "remove image" button when needed
					if ( '0' === jQuery( '#clikea_home_background' ).val() || '' == jQuery( '#clikea_home_background' ).val()) {
                        jQuery( '.remove_image_button' ).hide();
					}

					// Uploading files
					var file_frame;

					jQuery( document ).on( 'click', '.upload_image_button', function( event ) {

						event.preventDefault();

						// If the media frame already exists, reopen it.
						if ( file_frame ) {
							file_frame.open();
							return;
						}

						// Create the media frame.
						file_frame = wp.media.frames.downloadable_file = wp.media({
							title: 'Choisir une image',
							button: {
								text: 'Utiliser l’image'
							},
							multiple: false
						});

						// When an image is selected, run a callback.
						file_frame.on( 'select', function() {
							var attachment           = file_frame.state().get( 'selection' ).first().toJSON();
							var attachment_thumbnail = attachment.sizes.thumbnail || attachment.sizes.full;

							jQuery( '#clikea_home_background' ).val( attachment.id );
							jQuery( '#clikea_home_background_picture' ).find( 'img' ).attr( 'src', attachment_thumbnail.url );
							jQuery( '.remove_image_button' ).show();
						});

						// Finally, open the modal.
						file_frame.open();
					});

					jQuery( document ).on( 'click', '.remove_image_button', function() {
						jQuery( '#clikea_home_background_picture' ).find( 'img' ).attr( 'src', '/wp-content/themes/clikea/assets/img/clikea-placeholder.png' );
						jQuery( '#clikea_home_background' ).val( '' );
						jQuery( '.remove_image_button' ).hide();
						return false;
					});
                    </script>
                    <div class="clear"></div>
				
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <?php
            settings_fields('clikea-home-page');
            do_settings_sections('clikea-home-page');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

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
    
    wp_enqueue_style    ('font-awsome',  'https://use.fontawesome.com/releases/v5.0.6/css/all.css');
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