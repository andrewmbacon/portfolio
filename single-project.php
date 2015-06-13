<?php 
get_header();

$cats = wp_get_post_terms($post->ID, 'projectcategory');
$tags = wp_get_post_terms($post->ID, 'projecttag');

function project_classes(){
	global $cats;
	global $tags;
	foreach ($cats as $cat => $value) {
		echo $value->slug.' ';
	};
	foreach ($tags as $tag => $value) {
		echo $value->slug.' ';
	};
};
?>
<article class="<?php project_classes();?>">
	<?php while ( have_posts() ) : the_post(); ?>
	<div id="project-header-wrapper">
		<div class="container">
			<div class="row" id="project-header">
				<div class="col-sm-12">
					<header class="clearfix">
						<h1 id="project-title"><?php the_title(); ?> </h1> <p id="project-meta" class="small"><?php the_field('timeframe')?></p>
					</header>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<main id="project-main">
					<?php the_content(); ?>
				</main>
				<hr/>
				<footer>
					<p>
						<span class="cats">
							<?php
							
							$cats_length = sizeof($cats);
							if ($cats_length > 1){
								echo '<span class="label">Categories:</span> ';
							} else {
								echo '<span class="label">Category:</span> ';
							};
							$c = 0;
							foreach ($cats as $cat => $value) {
								$c++;
								echo '<a href="'.  esc_url( home_url( '/' ) ).'projectcategory/'.$value->slug.'">'.$value->name.'</a>';
								if ($c<$cats_length){
									echo ', ';
								}
							};
							?>
						</span>
						<span class="tags">
							<?php 
							$tags = wp_get_post_terms($post->ID, 'projecttag');
							$tags_length = sizeof($tags);
							if ($tags_length > 1){
								echo '<span class="label">Tags:</span> ';
							} else {
								echo '<span class="label">Tag:</span> ';
							};
							$t = 0;
							foreach ($tags as $tag => $value) {
								$t++;
								echo '<a href="'.  esc_url( home_url( '/' ) ).'projectcategory/'.$value->slug.'">'.$value->name.'</a>';
								if ($t<$tags_length){
									echo ', ';
								}
							};
							?>
						</span>
					</p>
				</footer>
			</div>
		</div>
	</div>	
	<?php endwhile; ?>
</article>
<?php get_footer(); ?>