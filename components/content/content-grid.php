<?php
    $sub_title = get_sub_field('sub_title'); 
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $grid_items = get_sub_field('grid_items');
?>
<section class="content-section information-grid">
    <div class="container small-container">
        <div class="intro-content">
            <span class="line"></span>
            <?php 
                if($sub_title) echo '<h4 class="section-sub-title">'. $sub_title .'</h4>';
                if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                if($description) echo '<div class="description">'. $description .'</div>';
            ?>
        </div>
    </div>
    <div class="container">
        <div class="list-container row">
            <?php foreach($grid_items as $key => $item):
                $title = $item['title'];
                $content = $item['content']; 
                $icon = $item['icon'];  ?>
                <div class="list-item col-lg-6">
                    <?php if($icon): ?>
                        <div class="icon-container">
                            <img src="<?php echo $icon['url']?>" alt="<?php echo $icon['alt']?>">
                        </div>
                    <?php endif; ?>    
                    <div class="content">
                        <h3 class="title"><?php echo $title; ?></h3>
                        <div class="description"><?php echo $content?></div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
