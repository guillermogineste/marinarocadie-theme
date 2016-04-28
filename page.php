<?php get_header(); ?>

	<main role="main">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<!-- TOP TITLE SECTION -->
			<section class="section section--title section--title--first">
				<h1 class="heading heading--one">
					<?php the_title(); ?>
				</h1>
			</section>
			<!-- PAGE CONTENT SECTION -->
			<?php
			$classes = array(
			    'section',
			    'section--text',
			);
			?>
			<section id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
				<?php the_content(); // Dynamic Content ?>
			</section>
		<?php endwhile; ?>
		<?php else: ?>
			<!-- article -->
			<article>
				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
			</article>
			<!-- /article -->
		<?php endif; ?>
	</main>

<?php get_footer(); ?>
