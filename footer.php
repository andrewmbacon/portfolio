</div><!--/#content-->
<footer id="footer">
	<div id="footer-inner">
		<div class="container">
			<div class="row">
				<?php ( is_active_sidebar('footer') ? dynamic_sidebar('footer'): '' ); ?>
			</div>
		</div>
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
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>