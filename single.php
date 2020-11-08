<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

?>

<?php get_header(); ?>

<div id="primary" class="content-area site-single">
	<div class="container">
		<div class="row justify-content-center">
			<?php Helper::left_sidebar(); ?>
				<div class="col-lg-8">
					<div class="main-content py-50 my-10">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<?php
							get_template_part( 'template-parts/content-single' );
							if ( comments_open() || get_comments_number() ) {
								echo '<div class="comments-wrapper">';
								comments_template();
								echo '</div>';
							}
							?>
						<?php endwhile; ?>
					</div>
				</div>
			<?php Helper::right_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
