<?php get_header(); ?>

	<main role="main">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- TOP TITLE SECTION -->
		<section class="section section--title section--title--first">
			<h1 class="heading heading--one">
				<?php the_title(); ?>
			</h1>
		</section>

		<!-- WORKS SECTION -->
		<?php
		$classes = array(
		    'section',
		    'section--works',
		);
		?>
		<section id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
      <!-- LOOP OF IMAGES -->
        <?php
        $fields = CFS()->get( 'works' );
        if ($fields) {
					$first = true;
          foreach ( $fields as $field ) {
						if ( $first ) {
				      printf('<div class="work work--first">');
				      $first = false;
				    } else {
				      printf('<div class="work">');
				    }
            printf('<div class="work__wrapper">');
            // IMAGE
            list($width, $height, $type, $attr) = getimagesize($field['image']);
            printf('<img class="work__image" src="%1$s" alt="%2$s">',
              $field['image'],
              $field['title'],
              $width,
              $height
            );
            // CAPTION
            printf('<div class="work__caption">');
            // Fields
						if ($field['title']) {
							printf('<span class="work__caption__text work__caption__text--title">%1$s</span>',
	              $field['title']
	            );
						}
            if ($field['technique']) {
							printf('<span class="work__caption__text work__caption__text--technique">%1$s</span>',
	              $field['technique']
	            );
            }
            if ($field['width'] && $field['height']) {
							printf('<span class="work__caption__text work__caption__text--size">%1$sx%2$s cm</span>',
	              $field['width'],
	              $field['height']
	            );
            }
						if ($field['year']) {
							printf('<span class="work__caption__text work__caption__text--year">%1$s</span>',
	              $field['year']
	            );
						}
            printf('</div>');

            printf('</div>');
            printf('</div>');
          }
        }
        ?>
				<!-- BOTTOM TITLE SECTION -->
				<section class="section section--title section--title--second">
					<h1 class="heading heading--one">
						<?php the_title(); ?>
					</h1>
				</section>

				<!-- PROJECT TEXT SECTION -->
				<section class="section section--text">
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

	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
