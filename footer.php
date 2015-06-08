</div><!--/#content-->
<footer id="footer">
	<div id="footer-inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<div id="about">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/me.jpg" alt="Photo of Andrew Bacon"/>
						<p>I am an interactive designer working in eastern Connecticut, focused on building tools that bridge the gap between people and technology, and intent on improving the lives of normal people in small but meaningful ways.</p>
					</div>
				</div>
				<div class="col-sm-2">
					<?php
						if (wp_get_nav_menu_object('Footer')){
							$defaults = array(
								'menu'			=> 'Footer',
								'container'       => false,
								'items_wrap'      => '<ul>%3$s</ul>',
								'depth'			=> 1,
								'fallback_cb'		=> false
							);
							wp_nav_menu( $defaults );
						}
					?>
				</div>
				<div class="col-sm-5">
					<?php the_widget('WP_Widget_Search');?>
					<p><a href="mailto:andrewbacon@me.com">andrewbacon@me.com</a></p>
					<p>(860) 912-2168</p>
				</div>
				<?php // ( is_active_sidebar('footer') ? dynamic_sidebar('footer'): '' ); ?>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>