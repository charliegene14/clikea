<?php

/**
 * Shop Navigation start wrapper
 */
function clikea_shop_nav_wrap_start() {
    if (is_woocommerce()):
    ?>
        <div id="clikea-shop-navigation-container">
    <?php
    endif;
}

/**
 * Content of shop navigation
 */
function clikea_shop_nav_content() {
    if (is_woocommerce()):

    clikea_shop_menu();

    /*clikea_search_wc_widget();
    clikea_cart_wc_widget();
    clikea_user_menu();*/

    ?>

    <?php
    endif;
}

/**
 * Shop Navigation end wrapper
 */
function clikea_shop_nav_wrap_end() {
    if (is_woocommerce()):
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
        <?php wp_nav_menu(array('menu' => 'Navigation gauche')); ?>
        <a class="clikea-navigation-logo" href="/">
            <img src="/wp-content/themes/clikea/assets/img/logo.svg" alt="logo">
        </a>
        <?php wp_nav_menu(array('menu' => 'Navigation droite')); ?>
    </nav>

    <?php
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
    elseif (is_woocommerce()):
        ?> <header id="clikea-wc-nav-container"> <?php
    else:
        ?> <header id="clikea-normal-nav-container"> <?php
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
        <?php the_widget('WC_Widget_Product_Search', 'title=') ?>
    </div>
    <?php
}

/**
 * Cart Widget called in
 * #clikea-widget-cart-container
 * .clikea-widget-cart-container
 */
function clikea_cart_wc_widget(){
    ?>
    <div id="clikea-widget-cart-container" class="clikea-widget-cart-container">
        <?php the_widget('WC_Widget_Cart', 'title=') ?>
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
        <?php wp_nav_menu(array('menu' => 'Boutique')); ?>
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
        <?php wp_nav_menu(array('menu' => is_user_logged_in() ? 'Utilisateur connecté' : 'Utilisateur déconnecté')); ?>
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
       echo '<span class="new-product">' . esc_html__( 'New!', 'woocommerce' ) . '</span>';
    }
}