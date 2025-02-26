<?php
$cards = get_sub_field('cards');
$section_title = get_sub_field('title');
?>
<section class="content-section simple-cards">
    <h5 class="title"><?php echo $section_title; ?></h5>
    <div class="card-container">
        <?php foreach($cards as $card):
            $title = $card['title'];
            $description = $card['description']; 
            $icon = $card['icon']; 
            $link = $card['link']; ?>
            <?php 
            if($link){ 
                echo '<a target="'.$link['target'].'" href="'.$link['url'].'" class="simple-card">';} 
            else {
                echo '<div class="simple-card">';
            }?>
                <div>
                    <?php if($title): ?>
                    <h3 class="title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <div class="description"><?php echo $description?></div>
                </div>
                <img src="<?php echo $icon['url']?>" alt="<?php echo $icon['alt']?>">
            <?php 
            if($link){ 
                echo '</a>';} 
            else {
                echo '</div>';
            }?>
        <?php endforeach;?>
    </div>
</section>
