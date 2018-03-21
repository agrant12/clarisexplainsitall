<?php

// =============================================================================
// VIEWS/ETHOS/WP-SINGLE.PHP
// -----------------------------------------------------------------------------
// Single post output for Ethos.
// =============================================================================

$fullwidth = get_post_meta( get_the_ID(), '_x_post_layout', true );

?>

<?php get_header(); ?>	
	<div class="x-container max width main offset">
		<div class="offset cf">
			<div class="" role="main">
				<div class="x-main left <?php echo ($fullwidth === 'on' ? 'full': ' '); ?>">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="entry-wrap">
							<div class="categories">
								<?php $categories = get_categories('category');
								foreach ($categories as $category): ?>
									<a href="<?php echo home_url("/category/" . $category->slug); ?>"><?php echo $category->name; ?></a>
								<?php endforeach; ?>
							</div>
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<!--<p class="author">by <?php the_author(); ?></p>-->
						</div>
						<div class="entry-featured"><div class="entry-thumb"><?php the_post_thumbnail('full'); ?></div></div>

						<div class="entry-wrap">
							<div class="entry-content content"><?php the_content(); ?></div>
						</div>
						<div class="entry-wrap"><?php x_get_view( 'global', '_comments-template' ); ?></div>
					<?php endwhile; ?>
				</div>
				<?php if ( $fullwidth != 'on' ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>