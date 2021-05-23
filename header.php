<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="clikea-navigation-container" class="clikea-navigation-container">
    <div id="clikea-navigation-background" class="clikea-navigation-background"></div>

    <nav class="clikea-navigation">
        <?php wp_nav_menu(array('menu' => 'Navigation gauche')); ?>

        <a class="clikea-navigation-logo" href="/">
            <img src="/wp-content/themes/clikea/assets/img/logo.svg" alt="logo">
        </a>

        <?php wp_nav_menu(array('menu' => 'Navigation droite')); ?> 
    </nav>
</div>