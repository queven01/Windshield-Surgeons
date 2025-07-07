<?php 
    $isTitle = get_field('title');

    $banner_sub_title = get_field('sub_title');
    $banner_description = get_field('description');
    $isBannerImage = isset(get_field('image')['url']);
    $banner_button = get_field('primary_button');
    $banner_button_2 = get_field('secondary_button');
    $button_icon = get_field('primary_icon');
    $button_icon_2 = get_field('secondary_icon');
    $ending_text = get_field('ending_text');
    $image_row = get_field('image_row');

    $video = get_field('video');
    
    if($isTitle){
        $banner_title = get_field('title');
    } else {
        $banner_title = get_the_title();
    }

    if($isBannerImage){
        $banner_image = get_field('image')['url'];
    } else {
        $banner_image = get_the_post_thumbnail_url();
    }

    if(!$button_icon) {
        $button_icon = "";
    } else {
        $button_icon = $button_icon['url'];
    }
    if(!$button_icon_2) {
        $button_icon_2 = "";
    } else {
        $button_icon_2 = $button_icon_2['url'];
    }


    $service_btn_1 = get_field('button_1');
    $service_btn_2 = get_field('button_2');
    $service_btn_3 = get_field('button_3');
    $service_btn_4 = get_field('button_4');
    $service_btn_5 = get_field('button_5');
    $service_btn_6 = get_field('button_6');
?>

<section class="banner banner-home">
    <div class="container content animate__animated animate__fadeInDown animate__fast">
        <h1 class="title"><?php echo $banner_title; ?></h1>
        <h2 class="sub-title"><?php echo $banner_sub_title; ?></h2>
        <p class="description"><?php echo $banner_description; ?></p>
        <div class="buttons-container">
            <?php 
                if($banner_button):
                    echo '<a class="btn secondary" href="'. $banner_button['url'].'">';
                    if($button_icon){ echo file_get_contents($button_icon); };
                    echo $banner_button['title'] .'</a>'; 
                endif;
            ?>
            <?php 
                if($banner_button_2):
                    echo '<a class="btn" href="'. $banner_button_2['url'].'">';
                    if($button_icon_2){ echo file_get_contents($button_icon_2); };
                    echo $banner_button_2['title'] .'</a>'; 
                endif;
            ?> 
        </div>
        <p class="ending_text"><?php echo $ending_text; ?></p>
    </div>
</section>
<section class="car-diagram-section">
    <div class="car-diagram">
        <div class="image-container">
            <picture>
                <source
                    type="image/webp"
                    media="(max-width: 480px)"
                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-480w.webp 1x, <?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-960w.webp 2x">
                <source
                    type="image/webp"
                    media="(max-width: 768px)"
                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-768w.webp 1x, <?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-1536w.webp 2x">
                <source
                    type="image/webp"
                    media="(max-width: 1024px)"
                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-1024w.webp 1x, <?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-2048w.webp 2x">
                <source
                    type="image/webp"
                    media="(max-width: 1300px)"
                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-1300w.webp 1x, <?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-2600w.webp 2x">
                <source
                    type="image/webp"
                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-1300w.webp 1x, <?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-2600w.webp 2x">

                <source
                    media="(max-width: 480px)"
                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-480w.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-960w.png 2x">
                <source
                    media="(max-width: 768px)"
                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-768w.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-1536w.png 2x">
                <source
                    media="(max-width: 1024px)"
                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-1024w.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-2048w.png 2x">
                <source
                    media="(max-width: 1300px)"
                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-1300w.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-2600w.png 2x">
                <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-1300w.png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/car-diagram-1300w.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/image/car-diagram-2600w.png 2x"
                    alt="A car diagram"
                    width="1300" height="686" loading="eager"> 
        </picture>
        </div>
        <div class="content-container desktop">
            <?php if($service_btn_1):?>
                <div class="selection_container windshield_replacement">
                    <a href="<?php echo $service_btn_1['url']?>" class="selection_button windshield_replacement active"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
                    <a href="<?php echo $service_btn_1['url']?>" class="selection_info">
                        <?php echo $service_btn_1['title']?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if($service_btn_2):?>
                <div class="selection_container windshield_repair">
                    <a href="<?php echo $service_btn_2['url']?>" class="selection_button windshield_repair"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
                    <a href="<?php echo $service_btn_2['url']?>" class="selection_info">
                        <?php echo $service_btn_2['title']?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if($service_btn_3):?>
                <div class="selection_container windshield_ADAS">
                    <a href="<?php echo $service_btn_3['url']?>" class="selection_button windshield_ADAS"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
                    <a href="<?php echo $service_btn_3['url']?>" class="selection_info">
                        <?php echo $service_btn_3['title']?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if($service_btn_4):?>
                <div class="selection_container mirror">
                    <a href="<?php echo $service_btn_4['url']?>" class="selection_button mirror"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
                    <a href="<?php echo $service_btn_4['url']?>" class="selection_info">
                        <?php echo $service_btn_4['title']?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if($service_btn_5):?>
                <div class="selection_container side_glass">
                    <a href="<?php echo $service_btn_5['url']?>" class="selection_button side_glass"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
                    <a href="<?php echo $service_btn_5['url']?>" class="selection_info">
                        <?php echo $service_btn_5['title']?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if($service_btn_6):?>
                <div class="selection_container back_glass">
                    <a href="<?php echo $service_btn_6['url']?>" class="selection_button back_glass"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
                    <a href="<?php echo $service_btn_6['url']?>" class="selection_info">
                        <?php echo $service_btn_6['title']?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="content-container mobile">
            <div class="selection_container windshield_replacement">
                <a href="<?php echo $service_btn_1['url']?>" class="selection_button windshield_replacement active" data-button="replacement"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
            </div>
            <div class="selection_container windshield_repair">
                <a href="<?php echo $service_btn_2['url']?>" class="selection_button windshield_repair" data-button="repair"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
            </div>
            <div class="selection_container windshield_ADAS">
                <a href="<?php echo $service_btn_3['url']?>" class="selection_button windshield_ADAS" data-button="ADAS"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
            </div>
            <div class="selection_container mirror">
                <a href="<?php echo $service_btn_4['url']?>" class="selection_button mirror" data-button="mirror"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
            </div>
            <div class="selection_container side_glass">
                <a href="<?php echo $service_btn_5['url']?>" class="selection_button side_glass" data-button="side_glass"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
            </div>
            <div class="selection_container back_glass">
                <a href="<?php echo $service_btn_6['url']?>" class="selection_button back_glass" data-button="back_glass"><span><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/plus.svg' );?></span></a>
            </div>
        </div>
    </div>

    <div class="service-button-container mobile">
        <div class="selection_info active" data-button="replacement">
            <a href="<?php echo $service_btn_1['url']?>" class="btn secondary"><?php echo $service_btn_1['title']?></a>
        </div>
        <div class="selection_info" data-button="repair">
            <a href="<?php echo $service_btn_2['url']?>" class="btn secondary"><?php echo $service_btn_2['title']?></a>
        </div>
        <div class="selection_info" data-button="ADAS">
            <a href="<?php echo $service_btn_3['url']?>" class="btn secondary"><?php echo $service_btn_3['title']?></a>
        </div>
        <div class="selection_info" data-button="mirror">
            <a href="<?php echo $service_btn_4['url']?>" class="btn secondary"><?php echo $service_btn_4['title']?></a>    
        </div>
        <div class="selection_info" data-button="side_glass">
            <a href="<?php echo $service_btn_5['url']?>" class="btn secondary"><?php echo $service_btn_5['title']?></a>   
        </div>
        <div class="selection_info" data-button="back_glass">
            <a href="<?php echo $service_btn_6['url']?>" class="btn secondary"><?php echo $service_btn_6['title']?></a>    
        </div>
    </div>

    <?php if($image_row): ?>
        <div class="guarantee-row">
            <?php foreach($image_row as $image):
                $image = $image['image']; ?>
                <div class="image">
                    <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>" title="<?php echo $image['title']?>">
                </div>
            <?php endforeach;?>
        </div>
    <?php endif; ?>
</section>