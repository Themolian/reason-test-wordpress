<?php


// CREATE AN OPTIONS PAGE
if( function_exists('acf_add_options_page') )
{
    acf_add_options_page();
}


// GET THE ANCESTOR ID FOR A GIVEN PAGE
function rt_get_parent( $id=0 )
{
	$parent = array_reverse( get_post_ancestors( $id ) );
	if ( isset( $parent[0] ) ) {
		$first_parent = get_page( $parent[0] );
		return $first_parent->ID;
	} else {
		return $id;
	}
}

function get_excluded_pages() {
	$exclude = "";
	$args = array(
		'child_of' => 0, 
		'meta_key' => '_np_nav_status', 
		'meta_value' => 'hide', 
	);
	$pages = get_pages($args); 
	foreach ( $pages as $page ) {
		if ( $exclude ) $exclude .= ","; 
		$exclude .= $page->ID;
	}
	return $exclude;
}


// GET THE TOP LEVEL SECTION NAME TO USE AS A CLASS
function rt_page_name()
{
	$parts = explode("/", $_SERVER['REQUEST_URI']);
	if ( isset( $parts[1] ) )
	{
		echo $parts[1];
	}
	else
	{
		echo 'home';
	}
}


// Set the custom rewrite rules
function rt_rewrite_rules()
{
	global $wp;
	$wp->add_query_var('expertise');
	$wp->add_query_var('location');

	add_rewrite_rule('^jobs/expertise/([^/]*)/?','index.php?page_id=14&expertise=$matches[1]','top');
	add_rewrite_rule('^jobs/location/([^/]*)/?','index.php?page_id=14&location=$matches[1]','top');
}
// add_action( 'init', 'rt_rewrite_rules' );


// Add custom image sizes
function rt_set_imagesizes()
{
	add_image_size( 'blog', 420, 250, true ); // (soft cropped)
}
// add_action( 'after_setup_theme', 'rt_set_imagesizes' );


// Remove default image sizes here. 
function rt_remove_default_images( $sizes ) {
	unset( $sizes['medium']); // 300px
	unset( $sizes['large']); // 1024px
	unset( $sizes['medium_large']); // 768px
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'rt_remove_default_images' );


// General theme setup functions
function rt_setup()
{
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Add support for featured post / page images
	add_theme_support( 'post-thumbnails', array( 'post', 'team', 'reviews' ) );

	// Clean up the <head>
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'index_rel_link' ); // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
}
add_action( 'after_setup_theme', 'rt_setup' );


function rt_nav_menus()
{
	register_nav_menus( array(
		'primary' => 'Primary Menu',
		'legal' => 'Legal Menu',
	) );
}
add_action( 'init', 'rt_nav_menus' );


// SETUP CUSTOM POST TYPES
function rt_post_types()
{
	// Events
	$args = array(
		'labels' => array( 'name' => 'Events' ),
		'menu_icon' => 'dashicons-calendar',
		'hierarchical' => false,
		'supports' => array( 'title', 'thumbnail', 'author' ),
		'menu_position' => 5,
		'hierarchical' => true,
		'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
		'publicly_queryable' => true,  // you should be able to query it
		'show_ui' => true,  // you should be able to edit it in wp-admin
		'exclude_from_search' => true,  // you should exclude it from search results
		'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
		'has_archive' => false,  // it shouldn't have archive page
		'rewrite' => false,  // it shouldn't have rewrite rules
	);
	register_post_type( 'events', $args );

}
add_action( 'init', 'rt_post_types' );


// Register taxonomies for custom post types
function rt_taxonomy()
{

	register_taxonomy(
		'categories',
		array('reviews'),
		array(
			'hierarchical' => true,
			'label' => 'Categories',
			'show_in_quick_edit' => false,
			'rewrite' => false,
			// 'show_ui' => false,
			'show_admin_column' => true,
		)
	);
}
// add_action( 'init', 'rt_taxonomy' );


// check for current page classes, return false if they exist.
function rt_remove_parent_classes($class)
{
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}


// Adds "current_page_item" to custom post types menu
function rt_add_class_to_wp_nav_menu($classes)
{
	switch ( get_post_type() )
	{
		case 'post':
			// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
			$classes = array_filter($classes, "rt_remove_parent_classes");

			// add the current page class to a specific menu item (replace ###).
			if (in_array('page-item-10', $classes))
			{
				$classes[] = 'current_page_item';
			}
			break;

		case 'jobs':
			// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
			$classes = array_filter($classes, "rt_remove_parent_classes");

			// add the current page class to a specific menu item (replace ###).
			if (in_array('page-item-19', $classes))
			{
				$classes[] = 'current-menu-item';
			}
			break;

	}
	return $classes;
}
add_filter('page_css_class', 'rt_add_class_to_wp_nav_menu');


// Add to the At a Glance table on the dashboard
function rt_at_glance()
{
	$args = array(
		'public' => true,
		'_builtin' => false
	);
	$output = 'object';
	$operator = 'and';

	$post_types = get_post_types( $args, $output, $operator );
	foreach ( $post_types as $post_type )
	{
		$num_posts = wp_count_posts( $post_type->name );
		$num = number_format_i18n( $num_posts->publish );
		$text = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );
		if ( current_user_can( 'edit_posts' ) )
		{
			$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
			echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
		}
	}
}
// add_action( 'dashboard_glance_items', 'rt_at_glance' );


// Add Some CSS to At a Glance Widget
function rt_at_glance_css()
{
	echo '
		<style type="text/css">
			.jobs-count a:before {content:"\f307"!important}
			.reviews-count a:before {content:"\f313"!important}
			.team-count a:before {content:"\f12f"!important}
		</style>
	';
}
// add_action('admin_head', 'rt_at_glance_css');


// Build the breadcrumb trail
function the_breadcrumb()
{
	global $post;
	$html = '<ul>';
	if ( is_home() )
	{
		$html .= '<li><a href="/">Home</a></li>';
	}
	else
	{
		$html .= '<li><a href="/">Home</a></li>';

		if ( is_page() )
		{
			if( $post->post_parent )
			{
				$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
				foreach ( $ancestors as $ancestor )
				{
					$html .= '<li><a href="'.get_permalink(  $ancestor ).'">'.get_the_title($ancestor).'</a></li>';
				}
				$html .= '<li class="last"><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
			}
			else
			{
				$html .= '<li class="last"><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
			}
		}
		else if ( is_search() )
		{
			$html .= '<li class="last">Search Results</li>';
		}
		else if ( is_404() )
		{
			$html .= '<li class="last">Page not found</li>';
		}
		else if ( is_single() || is_category() || is_tag() || is_year() || is_month() || is_day() || is_author() )
		{
			$pageID = get_option( 'page_for_posts' );
			$ancestors = array_reverse( get_post_ancestors( $pageID ) );
			foreach ( $ancestors as $ancestor )
			{
				$html .= '<li><a href="'.get_permalink(  $ancestor ).'">'.get_the_title($ancestor).'</a></li>';
			}
			$html .= '<li><a href="'.get_the_permalink($pageID).'">'.get_the_title($pageID).'</a></li>';

			if ( is_single() )
			{
				$html .= '<li class="last"><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
			}
			else if ( is_category() )
			{
				$html .= '<li class="last">'.single_cat_title( '', false ).'</li>';
			}
			else if ( is_tag() )
			{
				$html .= '<li class="last">'.single_tag_title( '', false ).'</li>';
			}
			else if ( is_year() )
			{
				$html .= '<li class="last">'.get_the_time('Y').'</li>';
			}
			else if ( is_month() )
			{
				$html .= '<li class="last">'.get_the_time('F, Y').'</li>';
			}
			else if ( is_day() )
			{
				$html .= '<li class="last">'.get_the_time('F jS, Y').'</li>';
			}
			else if ( is_author() )
			{
				$author = get_userdata( get_query_var('author') );
				$html .= '<li class="last">'.$author->display_name.'</li>';
			}

    	}
    }
    $html .= '</ul>';
    echo $html;
}



