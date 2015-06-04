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


add_theme_support( 'post-thumbnails' );



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



?>