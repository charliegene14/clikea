<?php

/**
 * Cart Toggle
 * Appears on cart image click.
*/
function clikea_cart_navigation() {
    ?>

    <nav class="clikea-cart-navigation">
        <?php wp_nav_menu(array('menu' => is_user_logged_in() ? 'Utilisateur connecté' : 'Utilisateur déconnecté')); ?>
    </nav>

    <?php
}

function badge_new_product() {
    global $product;
    $newness_days = 30;
    $created = strtotime( $product->get_date_created() );
    if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
       echo '<span class="new-product">' . esc_html__( 'New!', 'woocommerce' ) . '</span>';
    }
}