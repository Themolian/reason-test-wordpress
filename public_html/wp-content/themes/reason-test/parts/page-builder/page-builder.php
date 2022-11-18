<?php if(have_rows('page_builder')) : ?>
	<?php while(have_rows('page_builder')) : the_row(); ?>
		<?php if(get_row_layout() === 'content_block') : ?>
			<?php get_template_part('parts/page-builder/components/content-block', null, get_sub_field('content-block')); ?>
		<?php elseif(get_row_layout() === 'services_search') :?>
			<?php get_template_part('parts/page-builder/components/services-search', null, get_sub_field('services-search')); ?>
		<?php elseif(get_row_layout() === 'services') :?>
			<?php 
				$repeater_array = [];
				if(have_rows('services')) {
					while(have_rows('services')) {
						the_row();
						if(have_rows('cards')) {
							while(have_rows('cards')) {
								the_row();
								array_push($repeater_array, [get_sub_field('title'), get_sub_field('body'), get_sub_field('link')]);
							}
						}
					}
				}
			?>
			<?php get_template_part('parts/page-builder/components/services', null, [get_sub_field('services'), $repeater_array]); ?>
			<?php elseif(get_row_layout() === 'events_listing') :?>
				<?php get_template_part('parts/page-builder/components/events-listing', null, get_sub_field('events-listing')); ?>
			<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>