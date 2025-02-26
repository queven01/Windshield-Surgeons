<?php
    $sub_title = get_sub_field('sub_title'); 
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $testimonial_posts = get_sub_field('testimonial_posts');
    $number_of_columns = get_sub_field('number_of_columns');
    $button = get_sub_field('button');
?>
<section class="testimonial-component">
    <div class="container">
        <?php if($sub_title || $title || $description):?>
            <div class="intro-content"> 
                <div class="content wow animate__animated animate__slideInLeft">
                    <span class="line"></span>
                    <?php 
                        if($sub_title) echo '<h4 class="section-sub-title">'. $sub_title .'</h4>';
                        if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                        if($description) echo '<div class="description">'. $description .'</div>';
                    ?>
                </div>
                <?php if($button):?>
                    <div class="button-container wow animate__animated animate__slideInRight">
                        <a href="<?php echo $button['url']; ?>" class="btn transparent"><?php echo $button['title']; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if($testimonial_posts): ?>
            <!-- Swiper -->
        <div class="swiper testimonialSlider">
            <div class="swiper-wrapper">
                <?php foreach($testimonial_posts as $testimonial):
                    $id = $testimonial->ID;
                    $rating = get_field('rating', $id);
                    $name = get_field('name', $id);
                    $extra_text = get_field('extra_text', $id);
                    ?>
                    <div class="swiper-slide">
                        <div class="testimonial-container">
                            <div class="rating">
                                <?php 
                                    for ($x = 1; $x <= $rating; $x++) {
                                        echo file_get_contents( get_template_directory_uri() . '/assets/icons/star.svg' );
                                    }
                                ?>
                            </div>
                            <div class="content">
                                <?php echo $testimonial->post_content; ?>
                            </div>
                            <div class="author">
                                <span class="name"><?php echo $name; ?></span>
                                <span class="extra_text"><?php echo $extra_text; ?></span>
                            </div>
                        </div>  
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="testimonial-navigation">
                <div class="swiper-pagination"></div>
                <div class="slider-arrows">
                    <div class="prev_slide"><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/arrow-slider.svg' ); ?></div>
                    <div class="next_slide flip"><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/arrow-slider.svg' ); ?></div>
                </div>
            </div>
        </div> 
        <?php endif; ?>
    </div>
</section>