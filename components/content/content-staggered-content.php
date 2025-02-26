<?php
    $sub_title = get_sub_field('sub_title'); 
    $title = get_sub_field('title');
    $content = get_sub_field('content');
    $button = get_sub_field('button');
    $list_items = get_sub_field('list_items');
?>
<section class="content-section staggered-list">
    <div class="container">
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
                $sub_title = $item['sub_title'];
                $content = $item['content']; 
                $icon = $item['icon'];  ?>
                <div class="list-item <?php if($key % 2 != 0){ echo "flip"; }?>">
                    <div class="content">
                        <h3 class="title"><?php echo $title; ?></h3>
                        <h4 class="sub_title"><?php echo $sub_title; ?></h4>
                        <div class="description"><?php echo $content?></div>
                    </div>
                    <?php if($icon):?>
                    <div class="image-container">
                        <img src="<?php echo $icon['url']?>" alt="<?php echo $icon['alt']?>">
                    </div>
                    <?php endif; ?>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
