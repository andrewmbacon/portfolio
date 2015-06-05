<?php


/* 
	Basic settings
*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
//http://bhoover.com/remove-unnecessary-code-from-your-wordpress-blog-header/
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
add_theme_support( 'post-thumbnails', array( 'post', 'project' ) );



function disable_comments_media_attachments( $open, $post_id ){
	$post = get_post_type( $post_id );
	if( $post == 'attachment' ) {
		$open = false;
	}
	return $open;
}
add_filter('comments_open', 'disable_comments_media_attachments', 10 , 2);



function register_my_menu() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'portfolio' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );





require_once('inc/wp_bootstrap_navwalker.php');



function portfolio_scripts() {	
	wp_enqueue_style( 'portfolio-css', get_stylesheet_uri());
	wp_enqueue_script( 'portfolio-bootstrap-js', get_template_directory_uri() .'/bootstrap-sass/javascripts/bootstrap.min.js', array( 'jquery' ));
	wp_enqueue_script( 'portfolio', get_template_directory_uri() . '/js/portfolio.min.js', array( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );

function htmlShiv(){
	$template = get_template_directory_uri();
	echo 	'<!--[if lt IE 9]>
	<script src="' . $template . '/js/html5shiv/html5shiv.min.js"></script>
	<script src="' . $template . '/js/html5shiv/html5shiv-printshiv.min.js"></script>
<![endif]-->';
	echo "\n";	
}
add_action( 'wp_head', htmlShiv, 1 );

function ieBootstrap(){
	$template = get_template_directory_uri();
	echo 	'<!--[if lt IE 9]>
	<script src="' . $template . '/js/respond.min.js"></script>
<![endif]-->';
echo "\n";
}
add_action( 'wp_head', ieBootstrap, 99 );

function create_post_types() {
	$labels= array(
		'name' 				=> 'Projects',
		'singular_name' 	=> 'Project',
		'add_new' 			=> 'New Project',
		'add_new_item' 		=> 'Add New Project',
		'edit_item' 		=> 'Edit Project',
		'view_item' 		=> 'View Project',
		'search_items' 		=> 'Search Projects'
	);
	$project_args=array(
		'labels' 			=>$labels,
		'public' 			=> true,
		'public'            => true,
		'publicly_queryable'=> true,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'supports' 			=> array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'custom-fields', 'revisions'),
		'has_archive' 		=> true,
		'menu_position' 	=> 2,
		'menu_icon' 		=> 'dashicons-media-document',
		'query_var'         => true,
		'capability_type'   => 'post',
		'hierarchical'     	=> false,
		'can_export'		=> true
	);
	register_post_type( 'project',$project_args);

	register_taxonomy( 'skillset', 'project',
		array(
			'label' 		=> 'Skillsets',
			'labels' 		=> array(
									'name' 			=> 'Skillsets',
									'singular_name' => 'Skillset',
									'search_items' 	=> 'Search Skillset',
									'edit_item' 	=> 'Edit Skillset',
									'view_item' 	=> 'View Skillset',
									'update_item' 	=> 'Update Skillset',
									'add_new_item' 	=> 'Add New Skillset',
									'new_item_name' => 'New Skillset'
								),
			'public' 		=> true,
			'hierarchical' 	=> true,
			'rewrite' 		=> array('hierarchical' => true )
		)
	);
	register_taxonomy( 'tool', 'project',
		array(
			'label' 		=> 'Tools',
			'labels' 		=> array(
									'name' 			=> 'Tools',
									'singular_name' => 'Tool',
									'search_items' 	=> 'Search Tools',
									'edit_item' 	=> 'Edit Tool',
									'view_item' 	=> 'View Tool',
									'update_item' 	=> 'Update Tool',
									'add_new_item' 	=> 'Add New Tool',
									'new_item_name' => 'New Tool'
								),
			'public' 		=> true,
			'hierarchical' 	=> false,
		)
	);
}
add_action( 'init', 'create_post_types' );

function portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'portfolio' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'portfolio' ),
		'id'            => 'sidebar-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class=" col-sm-4 widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'portfolio_widgets_init' );

?>