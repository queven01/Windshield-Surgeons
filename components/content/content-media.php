<?php 
    $sub_title = get_sub_field('sub_title');
    $title = get_sub_field('title');
    $content = get_sub_field('content');
    $button = get_sub_field('button');
    $style = get_sub_field('style');
    $image = get_sub_field('image');
    $editor = get_sub_field('editor');
    $before_media = get_sub_field('before_media');
    $after_media = get_sub_field('after_media');
    
?>
<?php if($content): ?>
<section class="content-section media" >
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12">
                <h4>
                    <?php echo $before_media; ?>
                </h4>
                <?php if($style == "video"): ?>
                <div class="embed-container">
                    <?php
                        // Load value.
                        $iframe = get_sub_field('video');

                        // Use preg_match to find iframe src.
                        preg_match('/src="(.+?)"/', $iframe, $matches);
                        $src = $matches[1];

                        // Add extra parameters to src and replace HTML.
                        $params = array(
                            'controls'  => 0,
                            'hd'        => 1,
                            'autohide'  => 1
                        );
                        $new_src = add_query_arg($params, $src);
                        $iframe = str_replace($src, $new_src, $iframe);

                        // // Add custom width attribute.
                        // $width = '100%'; // Set the desired width here.
                        // if (preg_match('/width="\d+"/', $iframe)) {
                        //     // Replace existing width.
                        //     $iframe = preg_replace('/width="\d+"/', 'width="' . $width . '"', $iframe);
                        // } else {
                        //     // Add width if it doesn't exist.
                        //     $iframe = str_replace('<iframe', '<iframe width="' . $width . '"', $iframe);
                        // }

                        // Add extra attributes to iframe HTML.
                        $attributes = 'frameborder="0"';
                        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                        // Display customized HTML.
                        echo $iframe;
                        ?>

                        <!-- <div class="custom-video-wrapper" style="position: relative; width: 600px; max-width: 100%; overflow: hidden;">
                            <div class="custom-video-overlay" 
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5) url('your-custom-play-icon.png') no-repeat center center; cursor: pointer; z-index: 2;">
                            </div>
                            <div class="custom-video-iframe" style="position: relative; z-index: 1; pointer-events: none;">
                                <?php echo $iframe; ?>
                            </div>
                        </div>
                        
                        <script>
                            document.querySelector('.custom-video-overlay').addEventListener('click', function() {
                                // Hide the overlay
                                this.style.display = 'none';

                                // Enable iframe interaction (remove pointer-events)
                                document.querySelector('.custom-video-iframe').style.pointerEvents = 'auto';
                            });
                        </script> -->
                </div>
                <?php endif; ?>
                <?php if($style == "iframe"):?>
                    <div class="iframe-container">
                        <?php echo $editor; ?>
                    </div>
                <?php endif; ?>
                <?php if($style == "image"): ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                <?php endif; ?>
                <p>
                    <?php echo $after_media; ?>
                </p>
            </div>
            <div class="col-lg-5">
                <?php if($title || $sub_title): ?>
                    <div class="intro-content wow animate__animated animate__slideInLeft">
                        <span class="line"></span>
                        <?php 
                            if($sub_title) echo '<h4 class="section-sub-title">'. $sub_title .'</h4>';
                            if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-7">
                <?php echo $content; ?>
                <?php if ($button):?>
                <div class="button-container">
                    <a href="<?php echo $button['url']; ?>" class="btn primary" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
<?php endif; ?>