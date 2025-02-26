<?php
    $card = $args['cardValue'];
    $key = $args['key'];

    $image = $card['image'];
    $title = $card['title'];
    $description = $card['description'];
    if($card['button']){
        $button = $card['button']['url'];
        $button_text = $card['button']['title'];
    } else {
        $button = "";
        $button_text = "";
    }

    $offsetList = [0, 50, 100];
    $offsetIndex = $key % count($offsetList);
    $offset = $offsetList[$offsetIndex];

?>
<div class="card default wow animate__animated animate__fadeInUp" data-wow-offset="<?php echo $offset; ?>">
    <div class="image-container">
        <?php if($button){echo '<a href="'.$button.'">';}?>
            <img src="<?php echo $image['url']; ?>" alt="">
        <?php if($button){echo '</a>';}?>
    </div>
    <div class="content">
        <?php if($button){echo '<a href="'.$button.'">';}?>
            <h3 class="title"><?php echo $title ?></h3>
        <?php if($button){echo '</a>';}?>
        <p><?php echo $description; ?></p>
    </div>
    <?php if($button):?>
        <a class="btn secondary" href="<?php echo $button; ?>"><?php echo $button_text; ?></a>
    <?php endif; ?>
</div>