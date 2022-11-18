<?php 
	get_header();
?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<p>This is a single</p>

	<?php endwhile; endif; ?>

<?php
	get_footer();
?>