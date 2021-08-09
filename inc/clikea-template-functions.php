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
    clikea_search_wc_widget();
    clikea_cart_wc_widget();
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
        <?php wp_nav_menu(array('theme_location' => 'left-main-menu')); ?>
        <a class="clikea-navigation-logo" href="/">
            <img src="/wp-content/themes/clikea/assets/img/logo.svg" alt="logo">
        </a>
        <?php wp_nav_menu(array('theme_location' => 'right-main-menu')); ?>
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
    ?>
    <div id="clikea-widget-cart-container" class="clikea-widget-cart-container">
        <img src='/wp-content/themes/clikea/assets/img/cart-icon.svg' alt='cart' />
        <div id="mini-cart">
            <?php the_widget('WC_Widget_Cart', 'title='); ?>
        </div>
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
        <?php wp_nav_menu(array('theme_location' => 'shop-menu')); ?>
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
        <img src='/wp-content/themes/clikea/assets/img/user-icon.svg' alt='user' />
        <div id="user">
            <?php wp_nav_menu(array('theme_location' => is_user_logged_in() ? 'user-connected-menu' : 'user-disconnected-menu')); ?>
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