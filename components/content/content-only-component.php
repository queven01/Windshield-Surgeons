<?php 
    $content = get_sub_field('content');
    $icon = get_sub_field('icon');
    $title = get_sub_field('title');
    $sub_title = get_sub_field('sub_title');
    $description = get_sub_field('description');
    $button = get_sub_field('button');
    $list_items = get_sub_field('list_items');
    $background_color = get_sub_field('background_color');

    $style = get_sub_field('style');

    $section_id = get_sub_field('section_id');

    $vertical_align_center = get_sub_field('vertical_align_center');
?>
<section <?php echo 'id="'.$section_id.'"'?> class="content-section content-only">
    <div class="container">
        <div class="row <?php if($vertical_align_center){echo 'vertical-align';} ?>">
            <div class="col-lg-6 content-side">
                <?php if($title || $description || $sub_title ):?>
                    <div class="intro-content">
                        <span class="line"></span>
                        <?php
                            if($sub_title) echo '<h4 class="section-sub-title">'. $sub_title .'</h4>'; 
                            if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                            if($description) echo '<div class="description">'. $description .'</div>';
                        ?>
                        <div class="buttons-container">
                            <?php if($button){ echo '<a class="btn secondary" href="'.$button['url'].'">'. $button['title'].'</a>'; }?> 
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 list-side">
                <div class="background-color" <?php if($background_color){echo 'style="background-color:'. $background_color .';"';}?>></div>
                <div class="list-container"> 
                    <ul class="list">
                        <?php foreach($list_items as $item): ?>
                            <li class="<?php echo $style; ?>">
                                <?php if( $item['link'] ){ echo '<a class="link" href="'.$item['link']['url'].'">'; } ?>
                                    <?php if($item['icon']):?>
                                    <div class="image-container">
                                        <img src="<?php echo $item['icon']['url']; ?>" alt="">
                                    </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if($item['sub_title']){echo "<h5>".$item['sub_title']."</h5>"; }?>
                                        <h3><?php echo $item['title']; ?></h3>
                                        <p><?php echo $item['description']; ?></p>
                                    </div>
                                <?php if($item['link']){ echo '</a>'; } ?>
                            </li> 
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>