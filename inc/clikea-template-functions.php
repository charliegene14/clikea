<?php

function clikea_shop_nav_wrap_start() {
    if (!is_front_page()):
        ?>
            <div id="clikea-shop-navigation-container">
        <?php
    endif;
}

function clikea_shop_nav_left() {
    if (!is_front_page()):

    ?><div id="clikea-shop-navigation-left-container"><?php
        clikea_shop_menu();
    ?></div><?php

    endif;
}

function clikea_shop_nav_right() {
    if (!is_front_page()):
    ?><div id="clikea-shop-navigation-right-container"><?php

        if ( class_exists( 'WooCommerce' ) ) {
            clikea_search_wc_widget();
            clikea_cart_wc_widget();
        } else {
            echo '<i style="color: red; font-size: 14px; margin: auto;">S\'il vous plaît, activez WooCommerce pour profiter de ce thème !</i>';
        }
    clikea_user_menu();
    ?></div><?php
    endif;
}

function clikea_shop_nav_wrap_end() {
    if (!is_front_page()):
        ?>
            </div>
        <?php
    endif;
}

/**
 * Main Navigation start wrapper
 */
function clikea_main_nav_wrap_start() {
    ?>
        <div id="clikea-main-navigation-container" class="clikea-main-navigation-container">
    <?php

    if(is_front_page()):
        ?>
            <div id="clikea-navigation-background" class="clikea-navigation-background-home"></div>
        <?php
    else:
        ?>
            <div id="clikea-navigation-background" class="clikea-navigation-background"></div>
        <?php
    endif;
}

/**
 * Content of first navigation
 */
function clikea_main_nav_content() {
    ?>

    <nav class="clikea-navigation">

        <div class="menu-navigation-gauche-container">
        <?php
            wp_nav_menu(array(
                'theme_location'    => 'left-main-menu',
                'container'         => NULL,
                'fallback_cb'       => function (){          
                    ?>
                    <ul class="menu">
                        <li><a href="/">Accueil</a></li>
                    </ul>
                    <?php
            }));
        ?>
        </div>

        <a class="clikea-navigation-logo" href="/">
            <img src="/wp-content/themes/clikea/assets/img/logo.svg" alt="logo">
        </a>

        <div class="menu-navigation-droite-container">
            <?php wp_nav_menu(array(
                'theme_location'    => 'right-main-menu',
                'container'         => NULL,
                'fallback_cb'       => 'clikea_default_right_main_menu'
            ));?>
        </div>

    </nav>

    <?php
}

function clikea_default_right_main_menu() {
    if (!class_exists('WooCommerce')) {
        if (get_post_status ( 2 ) == 'publish' || get_post_status ( 2 ) == 'draft'): ?>
            <ul class="menu">
                <li><a href="/?page_id=2">Page d'exemple</a></li>
            </ul>
        <?php else:
            ?>
            <ul class="menu">
                <li><a href="/">Menu droit</a></li>
            </ul>
            <?php
        endif;
    } else {
        ?>
        <ul class="menu">
            <li><a href="<?= wc_get_page_permalink( 'shop' ) ?>">Boutique</a></li>
        </ul>
        <?php
    }
}

/**
 * Main Navigation end wrapper
 */
function clikea_main_nav_wrap_end(){
    ?>
            </div>
        </div>
    <?php
}

/**
 * Header Global navigation start wrapper
 */
function clikea_nav_wrap_start(){
    if(is_front_page()):
        ?> <header id="clikea-front-nav-container"> <?php
    else:
        ?> <header id="clikea-wc-nav-container"> <?php
    endif;
}

/**
 * Header Global navigation end wrapper
 */
function clikea_nav_wrap_end(){
    ?>
        </header>
    <?php
}

/**
 * Search Form Input widget
 * Called in
 * #clikea-widget-search-container
 * .clikea-widget-search-container
 */
function clikea_search_wc_widget(){
    ?>
    <div id="clikea-widget-search-container" class="clikea-widget-search-container">
        <?php get_product_search_form(); ?>
    </div>
    <?php
}

/**
 * Cart Widget called in
 * #clikea-widget-cart-container
 * .clikea-widget-cart-container
 */
function clikea_cart_wc_widget(){

    global $woocommerce; 

    ?>
    <div id="clikea-widget-cart-container" class="clikea-widget-cart-container">
        <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
            <img src='/wp-content/themes/clikea/assets/img/cart-icon.svg' alt='cart' />
        </a>

        <?php if (!is_cart()): ?>
            <div id="mini-cart">
                <?php the_widget('WC_Widget_Cart', 'title='); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Archive Products menu
 * Displays in CSS: 
 * #clikea-shop-menu-container
 * .clikea-shop-menu-container
 */
function clikea_shop_menu(){
    ?>
    <nav id="clikea-shop-menu-container" class="clikea-shop-menu-container">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'shop-menu',
            'container' => NULL,
            'fallback_cb' => function () {
                ?>
                <ul class="menu">
                    <li class="menu-item menu-item-has-children"><a href="#">Lien 1</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-has-children"><a href="#">Ce menu sert</a>
                                <ul class="sub-menu">
                                <li class="menu-item"><a href="#">Voilà un</a></li>
                                <li class="menu-item"><a href="#">Sous menu...</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children"><a href="#">de présentation</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="#">Voilà un autre</a></li>
                                <li class="menu-item"><a href="#">Sous menu...</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children"><a href="#">et d'éxemple.</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="#">Voilà encore un</a></li>
                                <li class="menu-item"><a href="#">autre Sous menu...</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item "><a href="#">Lien 2</a></li>
                </ul>
                <?php
            }
        ));
        ?>
    </nav>
    <?php
}

/**
 * Cart Shopping Menu
 * Displays in CSS:
 * #clikea-user-menu-container
 * .clikea-user-menu-container
 */
function clikea_user_menu() {
    ?>
    <nav id="clikea-user-menu-container" class="clikea-user-menu-container">
        <a href="<?php echo class_exists( 'WooCommerce' ) ? get_permalink(get_option( 'woocommerce_myaccount_page_id' )) : '/wp-login.php' ; ?>">
            <img src='/wp-content/themes/clikea/assets/img/user-icon.svg' alt='user' />
        </a>
        <div id="user">
            <?php
            if (is_user_logged_in()) {
                wp_nav_menu(array(
                    'theme_location' =>'user-connected-menu',
                    'fallback_cb' => function () {
                        ?>
                        <p>Menu: <br />Utilisateur connecté.</p>
                        <?php
                }));
            } else {
                wp_nav_menu(array('theme_location' => 'user-disconnected-menu',
                    'fallback_cb' => function () {
                        ?>
                        <p>Menu: <br />Utilisateur déconnecté.</p>
                        <?php 
                }));
            }
            ?>
        </div>
    </nav>
    <?php
}

/**
 * Display new product badge
 */
function badge_new_product() {
    global $product;
    $newness_days = 30;
    $created = strtotime( $product->get_date_created() );
    if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
       echo '<span class="badge-new-product">' . esc_html__( 'New !', 'woocommerce' ) . '</span>';
    }
}

function badge_out_of_stock() {
    global $product;
    $status = $product->get_stock_status();
    if ($status == 'outofstock') {
        echo '<span class="badge-out-stock">' .esc_html__( 'Rupture de stock', 'woocommerce' ). '</span>';
    }
}

function clikea_wc_shop_loop_subcategory_title( $category ) {
    ?>
    <div class="clikea-category-title-background">
        <h2 class="woocommerce-loop-category__title">
            <?php
            echo esc_html( $category->name );
            ?>
        </h2>
    </div>
    <?php
}

function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img class="product-category-thumbnail" src="' . $image . '" alt="' . $cat->name . '" />';
		}
	}
}