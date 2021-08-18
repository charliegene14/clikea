<?php get_header(); ?>

<div id="background-gradient"></div>
<a id="btn-home-collection" class="btn-home-collection" href="<?= get_option('clikea_home_btn_url') ?>"><span id="btn-text"><?= get_option('clikea_home_btn_text') ? get_option('clikea_home_btn_text') : 'Welcome home !' ?></span></a>


<script type="text/javascript" src="/wp-content/themes/clikea/assets/js/front-page.js"></script>
<?php get_footer('front');?>