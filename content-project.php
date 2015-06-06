<?php
/**
 * for page-blank.php 
 */
$id = get_the_ID();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" class="thumbnail">
	<?php
		if (get_the_post_thumbnail($id)) {
			the_post_thumbnail('full', array(
				'class' => "attachment-$size img-responsive ",
			));
		} else {
			echo '<img src="'. get_stylesheet_directory_uri().'/img/placeholder.png" alt="placeholder graphic" class="img-responsive" />';
		}
	?>
	</a>
	<div class="text">
		<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
		<div class="description">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>