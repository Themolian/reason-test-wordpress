
<div class="mobilenavigation-underlay"></div>
<nav class="mobilenavigation">
	<?php
		$args = array(
			'title_li' => '', 
			'container' => '',
			'menu_id' => 'primary',
			'menu_class' => 'mobilenavigation-list',
			'theme_location' => 'primary',
		);
		wp_nav_menu( $args );
	?>
</nav>
