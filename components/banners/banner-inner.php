<?php 
$id = get_queried_object_id();
$banner_description = get_field('description', $id);
$banner_button = get_field('button_1');
$banner_button_2 = get_field('button_2');

$button_icon = get_field('button_1_icon');
$button_icon_2 = get_field('button_2_icon');

$ending_text = get_field('sub_title');

$isTitle = get_field('title', $id);
$isBannerImage = isset(get_field('background_image')['url']);
 
if($isTitle){
    $banner_title = get_field('title', $id);
} else {
    $banner_title = get_the_title($id);
}

if($isBannerImage){
    $banner_image = get_field('background_image')['url'];
} else {
    $banner_image = get_the_post_thumbnail_url();
}

if(!$button_icon) {
    $button_icon = "";
} else {
    $button_icon = $button_icon['url'];
}
if(!$button_icon_2) {
    $button_icon_2 = "";
} else {
    $button_icon_2 = $button_icon_2['url'];
}
?>
<section class="banner banner-inner">
    <div class="container content">
        <h1 class="title"><?php echo $banner_title; ?></h1>
        <p><?php echo $banner_description; ?></p>
        <div class="buttons-container">
            <?php 
                if($banner_button):
                    echo '<a class="btn secondary" href="'. $banner_button['url'].'">';
                    if($button_icon){ echo file_get_contents($button_icon); };
                    echo $banner_button['title'] .'</a>'; 
                endif;
            ?>
            <?php 
                if($banner_button_2):
                    echo '<a class="btn" href="'. $banner_button_2['url'].'">';
                    if($button_icon_2){ echo file_get_contents($button_icon_2); };
                    echo $banner_button_2['title'] .'</a>'; 
                endif;
            ?> 
        </div>
        <p class="ending_text"><?php echo $ending_text; ?></p>
    </div>
</section> 