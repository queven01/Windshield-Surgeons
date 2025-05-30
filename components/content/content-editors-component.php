<?php 
    $sub_title = get_sub_field('sub_title'); 
    $title = get_sub_field('title');
    $content = get_sub_field('content');

    $content_columns = get_sub_field('content_columns');

    $background_color = get_sub_field('background_color');
    $small_container = get_sub_field('small_container');
    $number_of_columns = get_sub_field('number_of_columns');

    $vertical_align_center = get_sub_field('vertical_align_center');

    $section_id = get_sub_field('section_id');
    
    if($number_of_columns == 1){
        $column_Div = '<div class="col-12">';
    } elseif($number_of_columns == 2){
        $column_Div = '<div class="col-12 col-md-6">';
    } elseif($number_of_columns == 3){
        $column_Div = '<div class="col-12 col-lg-6 col-xl-4">';
    } elseif($number_of_columns == 4){ 
        $column_Div = '<div class="col-12 col-md-3">';
        
    }
?>
<?php if($content_columns): ?>
<section <?php echo 'id="'.$section_id.'"'?> class="content-section editors" >
    <div class="container <?php if($small_container){echo 'small-container';};?>">
        <?php if($title || $sub_title || $content): ?>
            <div class="intro-content">
                <span class="line"></span>
                <?php 
                    if($sub_title) echo '<h4 class="section-sub-title">'. $sub_title .'</h4>';
                    if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                    if($content) echo '<div class="description">'. $content .'</div>';
                ?>
            </div>
        <?php endif; ?>
        <div class="row g-5 <?php if($vertical_align_center){echo 'vertical-align';} ?>">
            <?php foreach($content_columns as $card): 
                echo $column_Div;?>
                    <?php echo $card['editor']; ?>
                    <?php if($card['button']){ echo '<a class="btn" target="'.$card['button']['target'].'"href="'.$card['button']['url'].'">'.$card['button']['title'].'</a>';}?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>