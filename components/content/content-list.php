<?php
    $sub_title = get_sub_field('sub_title'); 
    $title = get_sub_field('title');
    $content = get_sub_field('content');
    $content_after = get_sub_field('content_after');
    $button = get_sub_field('button');
    $list_items = get_sub_field('list_items');
    $angle = get_sub_field('turn_off_top_and_bottom_angle');
?>
<section class="content-section numerical-list <?php if($angle){ echo "remove-angle";}?>">
    <div class="container small-container">
        <div class="intro-content">
            <span class="line"></span>
            <?php 
                if($sub_title) echo '<h4 class="section-sub-title">'. $sub_title .'</h4>';
                if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                if($content) echo '<div class="description">'. $content .'</div>';
            ?>
        </div>
        <div class="list-container">
            <?php foreach($list_items as $key => $item):
                $title = $item['title'];
                $content = $item['content']; 
                $icon = $item['icon'];  ?>
                <div class="list-item <?php if($key % 2 != 0){ echo "flip"; }?>">
                    <div class="content">
                        <span class="number"><?php echo $key + 1; ?></span>
                        <div>
                            <h3 class="title"><?php echo $title; ?></h3>
                            <div class="description"><?php echo $content?></div>
                        </div>
                    </div>
                    <?php if($icon):?>
                    <div class="icon-container">
                        <img src="<?php echo $icon['url']?>" alt="<?php echo $icon['alt']?>">
                    </div>
                    <?php endif; ?>
                </div>
            <?php endforeach;?>
        </div>
        <?php if($content_after):?>
            <div class="after-list">
                <?php echo '<div class="description">'. $content_after .'</div>'; ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
</section>
