<?php 
	get_header();
?>

	<?php
		if (have_posts()) : 
	?>
	<ul>
	<?php
			while (have_posts()) : 
				the_post();
	?>
		<li><?php the_title(); ?></li>
	<?php
			endwhile;
	?>
	</ul>
	<?php
		endif;
	?>

<?php 
	get_footer(); 
?>