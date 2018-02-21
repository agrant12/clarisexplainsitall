<?php 
/*
Plugin Name: Recent Posts
Version: 1.0
Plugin URI: http://clarisexplainsitall.com
Description: Display posts with pagination
Author: Alvin Grant
Author URI: http://alvingrant.com
*/



function recent_posts($atts) {
	
	extract(shortcode_atts(array(
		'posts_per_page' => 9,
		'category_name' => '',
		'post_type' => 'post',
		'paginate' => true
	), $atts));

	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => $posts_per_page,
		'category_name' => $category_name,
		'paged' => $paged
	);

	$posts = new WP_Query($args);

	wp_reset_postdata();

	?>
		<section>
			<ul class="posts">
				<?php while ($posts->have_posts()) : $posts->the_post(); ?>
					<li class="post">
						<span class="category"><?php the_category(); ?></span>
						<span class="date"><?php esc_html(the_date()); ?></span>
						<span class="title"><?php echo esc_html(get_the_title()); ?></span>
						<a href="<?php esc_url(the_permalink()); ?>">
							<span class="featured-image"><?php the_post_thumbnail('full'); ?></span>
						</a>
						<span><a href="<?php esc_url(the_permalink()); ?>); ?>">Read More</a></span>
					</li>
				<?php endwhile; ?>
				<?php
					if ($paginate === true) {
						echo paginate_links( array(
							'base' => home_url('/page/%#%/'),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $posts->max_num_pages
						) );
					}
				?>
			</ul>
		</section>
	<?php
}

add_action('init', 'posts');
function posts() {
	wp_enqueue_style('posts', '/wp-content/themes/x-child/plugins/recent-posts/css/style.css', array());
}
