<?php

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

include(dirname(__FILE__) . '/plugins/recent-posts/recent-posts.php');
include(dirname(__FILE__) . '/plugins/slider/slider.php');

// Register Shortcodes
add_action( 'init', 'register_shortcodes');
function register_shortcodes() {
	add_shortcode('recent-posts', 'recent_posts');
	add_shortcode('slider', 'slider');
}

add_action('wp_head', 'register_css');
function register_css() {
	wp_enqueue_style('app', '/wp-content/themes/x-child/public/css/app.css', array());
}
