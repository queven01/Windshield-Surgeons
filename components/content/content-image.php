<?php 
    $sub_title = get_sub_field('sub_title'); 
    $title = get_sub_field('title');
    $content = get_sub_field('content');
    $in_between_icon = get_sub_field('in_between_icon');
    $button = get_sub_field('button');
    $images = get_sub_field('images');
?>
<section class="content-section image" >
    <div class="container">
        <div class="content">
            <?php if($title || $sub_title || $content): ?>
                <div class="intro-content">
                    <span class="line"></span>
                    <?php 
                        if($sub_title) echo '<h4 class="section-sub-title">'. $sub_title .'</h4>';
                        if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                    ?>
                </div>
            <?php endif; ?>
            <?php echo $content; ?>
        </div>
    <div class="images-row">
        <?php 
        $numItems = count($images);
        $i = 0;
        foreach($images as $key => $item):
            $image = $item['image'];
            $description = $item['image_description']; ?>
            <div class="image-item wow animate__animated animate__slideInRight">
                <div class="image-container">
                    <img class="main-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                    <?php 
                        if(++$i !== $numItems) {
                            echo '<span class="arrow"><img src="'. $in_between_icon['url'] .'"></span>';
                        } 
                    ?>
                </div>               
                <p><?php echo $description; ?></p>
            </div> 
        <?php endforeach; ?>
    </div>
</section>