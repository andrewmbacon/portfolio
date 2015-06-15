</div><!--/#content-->
<footer id="footer">
	<div id="footer-inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
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
								'items_wrap'      => '<ul id="footer-links">%3$s</ul>',
								'depth'			=> 1,
								'fallback_cb'		=> false
							);
							wp_nav_menu( $defaults );
						}
					?>
				</div>
				<div class="col-sm-4">
					<?php the_widget('WP_Widget_Search');?>
					<p><a href="mailto:andrewbacon@me.com">andrewbacon@me.com</a></p>
					<p>(860) 912-2168</p>
				</div>
				<?php // ( is_active_sidebar('footer') ? dynamic_sidebar('footer'): '' ); ?>
			</div>
			<div class="row">
				<div class="col-sm-10">
					<span id="copyright">&copy; <?php echo date('Y'); ?> Andrew Bacon</span>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64044283-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>