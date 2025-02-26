<?php 
    $sub_title = get_sub_field('sub_title');
    $title = get_sub_field('title');
    $content = get_sub_field('content');
    $button = get_sub_field('button');
    $style = get_sub_field('style');
    
?>
<?php if($content): ?>
<section class="content-section cta <?php echo $style;?>" >
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="intro-content wow animate__animated animate__slideInLeft">
                    <span class="line"></span>
                    <?php 
                        if($sub_title) echo '<h4 class="section-sub-title">'. $sub_title .'</h4>';
                        if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                    ?>
                </div>
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