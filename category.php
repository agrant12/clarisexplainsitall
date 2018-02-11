<?php

get_header(); ?>

	<div class="x-main full x-container x-custom" role="main">
		<div class="category">
			<ul class="posts">
				<?php while ( have_posts() ) : the_post(); ?>
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
			</ul>
		</div>
		<div class="category-sidebar">
			<?php get_sidebar('ups-sidebar-category'); ?>
		</div>
	</div>
<?php get_footer(); ?>

