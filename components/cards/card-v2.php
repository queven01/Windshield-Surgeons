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

    $offsetList = [0, 200, 300];
    $offsetIndex = $key % count($offsetList);
    $offset = $offsetList[$offsetIndex];

?>

<?php if($button):?>
    <a href="<?php echo $button; ?>" class="card v2 card-link wow animate__animated animate__fadeInUp" data-wow-offset="<?php echo $offset; ?>">
<?php else: ?>
    <div class="card v2 wow animate__animated animate__fadeInUp" data-wow-offset="<?php echo $offset; ?>">
<?php endif; ?>
    <div class="image-container">
        <img src="<?php echo $image['url']; ?>" alt="">
    </div>
    <div class="content">
        <h3 class="title"><?php echo $title ?></h3>
        <p><?php echo $description; ?></p>
    </div>
<?php if($button):?>
    </a>
<?php else: ?>
    </div>
<?php endif; ?>