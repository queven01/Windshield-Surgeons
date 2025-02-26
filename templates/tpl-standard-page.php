<?php 
/**
 * 
 * Template Name: Standard Page Template
 * 
 **/

 get_header(); ?>

<main id="main" class="site-main standard-page-template">
    <?php
        get_template_part("components/banners/banner-inner");
        get_template_part('template-parts/content-flexiable-display'); 
    ?> 
</main>

<?php
get_footer();