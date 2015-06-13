<?php
/*
* Template Name: Projects
* This page will display a grid of projects, and can include custom messages and taxonomy filters. 
*	 
*/
get_header();




$id = get_the_ID();

// Check the page's custom fields for taxonomy filters, sanitize the text. 
$project_category 	= get_post_meta($id, 'project_category', true);
$project_tag 		= get_post_meta($id, 'project_tag', true);
$project_category 	= sanitize_text_field($project_category);
$project_tag 		= sanitize_text_field($project_tag);
$category_length 	= strlen($project_category);
$tag_length 		= strlen($project_tag);

// based on the results, setup a taxonomy query for WP_Query
$tax_query;
if ($category_length>0 && $tag_length>0){
	// both category and tag are set. 
	$tax_query = array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'projectcategory',
			'field'    => 'slug',
			'terms'    => $project_category
		),
		array(
			'taxonomy' => 'projecttag',
			'field'    => 'slug',
			'terms'    => $project_tag,
		)
	);
} elseif ($category_length>0 && $tag_length==0){
	// only category is set. 
	$tax_query = array( 
		array(
			'taxonomy' => 'projectcategory',
			'field'    => 'slug',
			'terms'    => $project_category
		)
	);
} elseif ($category_length==0 && $tag_length>0) {
	// only tag is set.
	$tax_query = array(
		array(
			'taxonomy' => 'projecttag',
			'field'    => 'slug',
			'terms'    => $project_tag
		),
	);
}; 



$projects_args = array(
	'posts_per_page'	=> 10,
	'post_type'      	=> 'project',
	'orderby'			=> 'menu_order date',
	'order'  			=> 'DESC',	
	'tax_query' 		=> $tax_query	
);


$projects_query = new WP_Query($projects_args);

// Used to build the rows & columns. 
$projects_count = $projects_query->found_posts;
$project_counter = 0;
?>

<div class="container">
	<?php while ( have_posts() ) : the_post(); ?>
		<main>
			<?php the_content(); ?>
		</main>
	<?php endwhile;?>
	<div class="row">
		<?php
		// build the rows and columns. 
		while ( $projects_query->have_posts() ) {
				$projects_query->the_post();
				$project_counter++;
				echo '<div class="col-sm-2';
				//if ($project_counter == 9) {echo ' col-sm-offset-3';}
				echo '">';
				get_template_part( 'content', 'project' ); 
				echo '</div>';
				if ($project_counter % 5 == 0){ 
					//after every third post close this row, and start a new one. 
					echo '</div><!-- /row --><div class="row">';
				}
		}
		wp_reset_postdata();
		?>
	</div><!-- /last row -->
</div><!-- /container -->




<?php get_footer(); ?>	