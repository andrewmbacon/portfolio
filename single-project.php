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
				<div class="col-sm-10">
					<header class="clearfix">
						<h1 id="project-title"><?php the_title(); ?> </h1> <p id="project-meta" class="small"><?php the_field('timeframe')?></p>
					</header>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-10">
				<main id="project-main">
					<?php the_content(); ?>
				</main>
			</div>
		</div>
	</div>	
	<?php endwhile; ?>
</article>
<?php get_footer(); ?>