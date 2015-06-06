<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<fieldset>
		<label for="search" class="sr-only">Search in <?php echo home_url( '/' ); ?></label>
		<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
		<input type="button" value="Search" id="search-button" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
	</fieldset>
</form>