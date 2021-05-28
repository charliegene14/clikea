<?php

/**
 * Content of shop navigation
 */
function clikea_shop_nav_content() {
    ?>
        <div id="clikea-shop-navigation-container"></div>
    <?php
}

/**
 * Content of first navigation
 */
function clikea_main_nav_content() {
    ?>
        <?php wp_nav_menu(array('menu' => 'Navigation gauche')); ?>
        <a class="clikea-navigation-logo" href="/">
            <img src="/wp-content/themes/clikea/assets/img/logo.svg" alt="logo">
        </a>
        <?php wp_nav_menu(array('menu' => 'Navigation droite')); ?> 

    <?php
}

/**
 * Start Normal Page navigation wrapper
 */
function clikea_nav_wrap_start(){
    if(is_front_page()):
        ?>
            <header id="clikea-front-nav-container">
                <div id="clikea-navigation-container" class="clikea-navigation-container">
                    <div id="clikea-navigation-background" class="clikea-navigation-background-home"></div>
                    <nav class="clikea-navigation">
        <?php

    elseif (is_woocommerce()):
        ?>
            <header id="clikea-wc-nav-container">
                <div id="clikea-navigation-container" class="clikea-navigation-container">
                    <div id="clikea-navigation-background" class="clikea-navigation-background"></div>
                    <nav class="clikea-navigation">


        <?php
    else:
        ?>
            <header id="clikea-normal-nav-container">
                <div id="clikea-navigation-container" class="clikea-navigation-container">
                    <div id="clikea-navigation-background" class="clikea-navigation-background"></div>
                    <nav class="clikea-navigation">
        <?php
    endif;
}

/**
 * Ending main navigation wrapper
 */
function clikea_main_nav_wrap_end(){
    ?>
                    </nav>
                </div>
            </div>
    <?php
}

/**
 * Ending navigation wrapper
 */
function clikea_nav_wrap_end(){
    ?>
        </header>
    <?php
}

/**
 * Cart Toggle
 * Appears on cart image click.*/
function clikea_cart_navigation() {
    ?>

    <nav class="clikea-cart-navigation">
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