<?php

function rt_scripts() { 

	// Styles
	wp_enqueue_style( 'rt-styles', get_template_directory_uri() . '/static/min/css/styles.min.css', false, '1.0', 'all' );

	// Scripts
	wp_enqueue_script('rt-third-party', get_stylesheet_directory_uri() . '/static/min/js/third-party.min.js', array( 'jquery' ), '1.0', true);
	wp_enqueue_script('rt-core', get_stylesheet_directory_uri() . '/static/min/js/core.min.js', array( 'jquery' ), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'rt_scripts' );
