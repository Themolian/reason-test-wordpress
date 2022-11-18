<!DOCTYPE html>
<html lang="EN">

<head>

	<title><?php the_title(); ?></title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/static/min/img/favicon.png" />

<body <?php body_class(); ?>>

<section class="header-top">
	<div class="header-top__inner">
		<div class="header-top__search">
			<?php echo get_search_form(); ?>
		</div>
		<div class="header-top__links">
			<a href="<?php echo get_site_url() ?>/learn" class="nav-button">Learn</a>
			<a href="<?php echo get_site_url() ?>/donate" class="nav-button nav-button--active">Donate</a>
		</div>
	</div>
</section>
<header class="header">
	<div class="header-inner">
		<div class="header-logo">
			<a href="<?php echo get_site_url() ?>">
				<img src="<?php echo get_theme_file_uri('static/min/img/logo.png'); ?>" alt="Good Things Foundation Logo">
			</a>
		</div>
		<nav class="header-navigation">
			<?php 
				$args = array(
					'depth' => 2, 
					'title_li' => '', 
					'container' => '',
					'menu_id' => 'primary',
					'menu_class' => 'primary',
					'theme_location' => 'primary'
				);
				wp_nav_menu( $args );
			?>
		</nav>
		<div class="menu-toggle">
			<span class="line-1"></span>
			<span class="line-2">Menu Toggle</span>
			<span class="line-3"></span>
		</div>
	</div>
</header>
<?php get_template_part('parts/mobilenavigation'); ?>

