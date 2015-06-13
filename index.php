<?php get_header();?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					<p><?php the_excerpt(); ?>

				<?php endwhile; ?>

			<?php else : ?>

	

			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>