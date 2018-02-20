<?php 
/*
Plugin Name: Slider
Version: 1.0
Plugin URI: http://clarisexplainsitall.com
Description: Display list of posts in a slider on the page
Author: Alvin Grant
Author URI: http://alvingrant.com
*/

function slider($atts) {

	extract(shortcode_atts(array(
		'posts' => 3,
		'category' => 'features'
	), $atts));

	$args = array(
				'post_type' => array('post'),
				'category_name' => $category,
				'posts_per_page' => $posts
			);

	$loop = new WP_Query($args);
	
	$posts = $loop->posts;

	wp_reset_postdata();
	?>
		<section>
			<div class="slider">
				<?php foreach ($posts as $key => $post): ?>
					<div class="slide">
						<a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo get_the_post_thumbnail($post->ID, 'full'); ?></a>
						<a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
							<?php echo esc_html($post->post_title); ?>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	<?php

	// Temp url for vagrant enviroment. Change for production!!!!!!
	wp_enqueue_style('slider', '/wp-content/themes/x-child/plugins/slider/css/slick.css', array());
	wp_enqueue_style('slider', '/wp-content/themes/x-child/plugins/slider/css/slick-theme.css', array());
	wp_enqueue_script('slider', '/wp-content/themes/x-child/plugins/slider/js/slick.min.js', array('jquery'));
	wp_enqueue_script('slide', '/wp-content/themes/x-child/plugins/slider/js/settings.js', array('jquery'));
}
