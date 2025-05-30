<?php
/*
Template Name: HTML Sitemap
*/

get_header(); ?>
<main id="main" class="site-main standard-page-template">
    <?php
        get_template_part("components/banners/banner-inner");
    ?> 
    <div class="container">
<!-- Pages Section -->
<h3>Pages</h3>
    <ul>
        <?php
        $pages = get_pages(['sort_column' => 'menu_order']);
        function display_child_pages($parent_id, $pages) {
            echo '<ul>';
            foreach ($pages as $page) {
                if ($page->post_parent == $parent_id) {
                    echo '<li><a href="' . get_permalink($page->ID) . '">' . esc_html($page->post_title) . '</a>';
                    display_child_pages($page->ID, $pages); // Recursively show child pages
                    echo '</li>';
                }
            }
            echo '</ul>';
        }

        foreach ($pages as $page) {
            if ($page->post_parent == 0) {
                echo '<li><a href="' . get_permalink($page->ID) . '">' . esc_html($page->post_title) . '</a>';
                display_child_pages($page->ID, $pages);
                echo '</li>';
            }
        }
        ?>
    </ul>

    <!-- Blog Posts Section -->
    <h3>Blog Posts</h3>
    <ul>
        <?php
        $posts = get_posts(['numberposts' => -1]);
        foreach ($posts as $post) {
            echo '<li><a href="' . get_permalink($post->ID) . '">' . esc_html($post->post_title) . '</a></li>';
        }
        ?>
    </ul>

    <!-- Custom Post Type Section -->
     <?php 
        $custom_posts = get_posts([
            'post_type' => 'rank_math_locations', 
            'numberposts' => -1
        ]);
     ?>
     <?php if($custom_posts):?>
    <h3>Locations</h3>
    <ul>
        <?php
        foreach ($custom_posts as $post) {
            echo '<li><a href="' . get_permalink($post->ID) . '">' . esc_html($post->post_title) . '</a></li>';
        }
        ?>
    </ul>
    <?php endif; ?>
    <!-- Categories Section -->
    <h3>Categories</h3>
    <ul>
        <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            echo '<li><a href="' . get_category_link($category->term_id) . '">' . esc_html($category->name) . '</a></li>';
        }
        ?>
    </ul>


    </div>
</main>

<?php get_footer(); ?>
