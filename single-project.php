<?php get_header(); ?>
<article>
	<div class="container">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="row" id="project-header">
			<div class="col-sm-8">
				<header id="project-title">
					<h1 ><?php the_title(); ?> </h1> 
					<div id="description"><?php the_excerpt();?></div>
				</header>
			</div>
			<div class="col-sm-4">
				<div id="details">
					<!--
					<table>
						<tr>
							<th>Timeline</th>
							<td><?php the_field('timeframe')?></td>
						</tr>
						<tr>
							<th>Client</th>
							<td><?php the_field('client')?></td>
						</tr>
					</table>
					-->
					<p id="project-meta"><?php the_field('timeframe')?><br/>
						<?php the_field('client')?><br/>
					<?php the_field('role')?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<hr/>
				<main id="project-main">
					<?php the_content(); ?>
				</main>
				<hr/>
				<footer>
					<p>
						<span class="cats">
							<?php
							$cats = wp_get_post_terms($post->ID, 'projectcategory');
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
	<?php endwhile; ?>
	</div>
</article>
<?php get_footer(); ?>