<?php 
    $content = get_sub_field('content');
    $button = get_sub_field('button');

    $image = get_sub_field('image');
    $color = get_sub_field('color');
    
?>
<?php if($content): ?>
<section class="content-section cta-image <?php echo $color; ?>" >
    <div class="container small-container">
        <?php 
        if($color === 'red'){
            $btn_class = 'secondary filled';
        } else {
            $btn_class = 'primary';
        }
        ?>
        <div class="content">
            <?php echo $content; ?>
        </div>
        <?php if($button): ?>
            <div class="button-container">
                <?php echo '<a class="btn '.$btn_class.'" href="'.$button['url'].'" target="'.$button['target'].'">'.$button['title'].'</a>' ?>
            </div>
        <?php endif; ?>
    </div>
    <img class="background-image" src="<?php echo $image['url']; ?>">
</section>
<?php endif; ?>