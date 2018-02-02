<?php

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

include(dirname(__FILE__) . '/plugins/recent-posts/recent-posts.php');

// Register Shortcodes
add_action( 'init', 'register_shortcodes');
function register_shortcodes() {
	add_shortcode('recent-posts', 'recent_posts');
}
