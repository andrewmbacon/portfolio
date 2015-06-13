<?php get_header();?>
<div class="container">
	<?php while ( have_posts() ) : the_post(); ?>
		<main>
			<?php the_content(); ?>
		</main>
	<?php endwhile;?>
</div><!-- /container -->
<?php get_footer(); ?>	