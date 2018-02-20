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
