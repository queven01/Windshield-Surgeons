<?php 
    // Check value exists.
    if( have_rows('page_components') ):
        // Loop through rows.
        while ( have_rows('page_components') ) : the_row();

            if( get_row_layout() == 'card_columns' ):
                get_template_part( 'components/cards/card-component');
            elseif( get_row_layout() == 'content_columns' ): 
                get_template_part( 'components/content/content-image-component');
            elseif( get_row_layout() == 'content_only_column' ): 
                get_template_part( 'components/content/content-only-component');
            elseif( get_row_layout() == 'column_editors' ): 
                get_template_part( 'components/content/content-editors-component');
            elseif( get_row_layout() == 'related_posts' ): 
                get_template_part( 'components/galleries/gallery-masonry');
            elseif( get_row_layout() == 'content_with_accordions' ): 
                get_template_part( 'components/content/content-with-accordion');
            elseif( get_row_layout() == 'testimonials' ): 
                get_template_part( 'components/content/content-testimonials');
            elseif( get_row_layout() == 'call_to_action' ): 
                get_template_part( 'components/content/content-cta-image');
            elseif( get_row_layout() == 'content_call_to_action' ): 
                get_template_part( 'components/content/content-cta');
            elseif( get_row_layout() == 'accordions' ): 
                get_template_part( 'components/content/content-accordion');
            elseif( get_row_layout() == 'simple_cards' ): 
                get_template_part( 'components/content/content-simple-cards');
            elseif( get_row_layout() == 'numerical_list' ): 
                get_template_part( 'components/content/content-list');
            elseif( get_row_layout() == 'information_grid' ): 
                get_template_part( 'components/content/content-grid');
            elseif( get_row_layout() == 'column_image' ): 
                get_template_part( 'components/content/content-image');
            elseif( get_row_layout() == 'staggered_content' ): 
                get_template_part( 'components/content/content-staggered-content');
            elseif( get_row_layout() == 'media_content' ): 
                get_template_part( 'components/content/content-media');
            endif;

        // End loop. 
        endwhile; 

    // No value.
    else :
        // Do something...
        // echo "<h2> Add Something to your page </h2>";
    endif;
?>
