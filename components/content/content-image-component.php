<?php 
    $sub_title = get_sub_field('sub_title'); 
    $title = get_sub_field('title');
    $content = get_sub_field('content');
    $image = get_sub_field('image');
    $flip_image = get_sub_field('flip_image');
    $image_ratio = get_sub_field('image_ratio');
    $button = get_sub_field('button');

    $select_option_check = get_sub_field('select_option');
    $select_title = get_sub_field('select_title');
    $select_options = get_sub_field('select_options');

$section_id = get_sub_field('section_id');
?>
<section class="content-section with-image <?php if($flip_image){echo 'flip-image';}?>" >
    <div class="container">
    <div class="row">
            <div class="col-md-6 content-side wow animate__animated <?php if($flip_image){echo 'animate__slideInRight';} else { echo 'animate__slideInLeft'; }?>">
                <div class="content">
                    <div class="intro-content">
                        <span class="line"></span>
                        <?php 
                            if($sub_title) echo '<h4 class="section-sub-title">'. $sub_title .'</h4>';
                            if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                        ?>
                    </div>
                    <?php echo $content; ?>

                    <?php if($select_option_check): ?>
                        <h5 class="title"><?php echo $select_title; ?></h5>
                        <div class="button-container">
                            <?php foreach($select_options as $option):
                                $link = $option['link']; 
                                echo '<a class="btn secondary" href="'.$link['url'].'">'.$link['title'].'</a>';
                            endforeach;?>
                        </div>
                        
                    <?php elseif($button): 
                    
                        echo '<a target="'.$button['target'].'" class="btn" href="'.$button['url'].'">'.$button['title'].'</a>';
                    
                    endif; ?>

                </div>
            </div> 
            <div class="col-md-6 image-side wow animate__animated <?php if($flip_image){echo 'animate__slideInLeft';} else { echo 'animate__slideInRight'; }?> <?php if($image_ratio){echo 'image-ratio';}?>">
                <img src="<?php echo $image['url']; ?>" alt="">
                <?php echo file_get_contents( get_template_directory_uri() . '/assets/image/img-background.svg' ); ?>
            </div>
        </div>
    </div>
    <!-- <div class="dot-grid" style="background-image:url(<?php echo get_template_directory_uri() . '/assets/image/image-underlay.svg';?>)"></div> -->
</section>