<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package windshield_surgeons_theme
 */
if ( $args ) {
	$id = $args['data'];
} else {
	$id = get_the_ID();
}
?>

<article id="post-<?php echo $id; ?>" <?php post_class('card-blog'); ?>>
	<a href="<?php echo get_permalink($id); ?>">
		<div class="image-container">
			<?php echo get_the_post_thumbnail($id)?>
		</div>
		<div class="card-content">
			<div class="entry-categories">
				<?php 
					$categories = get_the_category($id);
					foreach($categories as $category):
						echo $category->name. " ";
					endforeach;
				?>
			</div>
			<header class="entry-header">
				<?php
					echo '<h3 class="entry-title">' . get_the_title($id) . '</h3>';
				?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
					echo get_the_excerpt($id);
				?>
			</div><!-- .entry-content -->
		</div>
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
