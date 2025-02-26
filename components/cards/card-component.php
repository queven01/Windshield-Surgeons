<?php 
    $sub_title = get_sub_field('sub_title');
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $dynamic_card = get_sub_field('dynamic_card');
    $secondary_style = get_sub_field('secondary_style');
    $card_style = get_sub_field('card_style');
    $center_align = get_sub_field('center_align');

    if($dynamic_card){
        $cards = get_sub_field('dynamic_card_chooser');
    } else {
        $cards = get_sub_field('cards');
    }

    $number_of_columns = get_sub_field('number_of_columns');
    
    if($number_of_columns == 1){
        $column_Div = '<div class="card-col col-12">';
    } elseif($number_of_columns == 2){
        $column_Div = '<div class="card-col col-12 col-md-6">';
    } elseif($number_of_columns == 3){
        $column_Div = '<div class="card-col col-12 col-md-4">';
    } elseif($number_of_columns == 4){ 
        $column_Div = '<div class="card-col col-12 col-md-3">';
    }
?>
<section class="card-component">
    <div class="container">
        <?php if($title || $description || $sub_title ):?>
            <div class="intro-content">
                <span class="line"></span>
                <?php
                    if($sub_title) echo '<h4 class="section-sub-title">'. $sub_title .'</h4>'; 
                    if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                    if($description) echo '<div class="description">'. $description .'</div>';
                ?>
            </div>
        <?php endif; ?>
        <div class="row g-5 card-row <?php if($center_align){echo "center_align";} ?>">
            <?php foreach($cards as $key => $card): 
                echo $column_Div; ?>
                    <?php get_template_part( 
                        'components/cards/card', $card_style, 
                        array(
                            'cardValue'	=> $card,
                            'key'       => $key,
                        ) 
                    ); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>