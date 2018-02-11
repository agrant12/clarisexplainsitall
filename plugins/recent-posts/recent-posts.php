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
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 9,
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
						<span class="date"><?php the_date(); ?></span>
						<span class="title"><?php echo get_the_title(); ?></span>
						<a href="<?php esc_url(the_permalink()); ?>">
							<span class="featured-image"><?php the_post_thumbnail('full'); ?></span>
						</a>
						<span><a href="<?php esc_url(the_permalink()); ?>); ?>">Read More</a></span>
					</li>
				<?php endwhile; ?>
				<?php
					echo paginate_links( array(
					'base' => home_url('/page/%#%/'),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $posts->max_num_pages
				) );
				?>
			</ul>
		</section>
	<?php
}
