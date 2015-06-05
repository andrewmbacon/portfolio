</div><!--/#content-->
<footer id="footer" class="widget-area">
	<div class="container">
		<div class="row">
			<?php ( is_active_sidebar('footer') ? dynamic_sidebar('footer'): '' ); ?>
		</div>
	</div>
</footer>
<?php
if (wp_get_nav_menu_object('Footer')){
	$defaults = array(
		'menu'			=> 'Footer',
		'container'       => false,
		'items_wrap'      => '%3$s',
		'depth'			=> 1,
		'fallback_cb'		=> false
	);
	wp_nav_menu( $defaults );
}
?>
<?php wp_footer(); ?>
</body>
</html>