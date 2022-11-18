
<article class="cards-item">
	<a href="<?php the_permalink(); ?>">
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<div class="cards-image--small"><img src="<?php the_post_thumbnail_url('small'); ?>" alt="<?php the_title(); ?>"></div>
			<div class="cards-image--feature"><img src="<?php the_post_thumbnail_url('feature'); ?>" alt="<?php the_title(); ?>"></div>
		<?php else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>/static/min/img/placeholders/news.jpg" alt="<?php the_title(); ?>">
		<?php endif; ?>
		<p class="tags">
			<?php
				$categories = get_the_category();
				$html = "";
				foreach( $categories as $category ) :
					if ( $html ) $html .= ", ";
					$html .= $category->name;
				endforeach;
				echo $html;
			?> 
		</p>
		<h3><?php the_title(); ?></h3>
		<div class="cards-excerpt"><?php the_excerpt(); ?></div>
	</a>
</article>
