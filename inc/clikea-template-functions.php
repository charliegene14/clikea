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