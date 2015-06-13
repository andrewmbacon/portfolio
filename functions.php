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
set_post_thumbnail_size( 700, 700 );


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
	wp_enqueue_style( 'portfolio-css', get_stylesheet_uri(), array(), '48');
	wp_enqueue_script( 'portfolio-bootstrap-js', get_template_directory_uri() .'/bootstrap-sass/javascripts/bootstrap.min.js', array( 'jquery' ));
	wp_enqueue_script( 'portfolio', get_template_directory_uri() . '/js/portfolio.js', array( 'jquery' ), '338');
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

	register_taxonomy( 'projectcategory', 'project',
		array(
			'label' 		=> 'Project Categories',
			'labels' 		=> array(
									'name' 			=> 'Project Categories',
									'singular_name' => 'Project Category',
									'search_items' 	=> 'Search Project Categories',
									'edit_item' 	=> 'Edit Project Category',
									'view_item' 	=> 'View Project Category',
									'update_item' 	=> 'Update Project Category',
									'add_new_item' 	=> 'Add New Project Category',
									'new_item_name' => 'New Project Category'
								),
			'public' 		=> true,
			'hierarchical' 	=> true,
			'rewrite' 		=> array('hierarchical' => true )
		)
	);
	register_taxonomy( 'projecttag', 'project',
		array(
			'label' 		=> 'Project Tags',
			'labels' 		=> array(
									'name' 			=> 'Project Tags',
									'singular_name' => 'Project Tag',
									'search_items' 	=> 'Search Project Tags',
									'edit_item' 	=> 'Edit Project Tag',
									'view_item' 	=> 'View Project Tag',
									'update_item' 	=> 'Update Project Tag',
									'add_new_item' 	=> 'Add New Project Tag',
									'new_item_name' => 'New Project Tag'
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
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'portfolio' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class=" col-sm-4 widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'portfolio_widgets_init' );

// Adds bootstrap class to all images. 
function img_responsive($class) {
    $class .= ' img-responsive';
    return $class;
}
add_filter('get_image_tag_class', 'img_responsive' );






?>