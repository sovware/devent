<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$post_class = Helper::has_sidebar() ? 'col-sm-12 col-12' : 'col-lg-6 col-md-12 col-sm-12 col-12';
?>

<?php get_header(); ?>

<div id="primary" class="content-area site-index p-bottom-110">
	<div class="container">
		<div class="row justify-content-center">
			<?php Helper::left_sidebar(); ?>
			<div class="<?php Helper::the_layout_class(); ?>">
				<div id="main-content" class="main-content pt-50 mt-10">
					<?php if ( have_posts() ) : ?>
						<div class="row blog-isotope">
							<?php
							while ( have_posts() ) :
								the_post();
								echo '<div class="' . $post_class . '">';
								get_template_part( 'template-parts/content-blog' );
								echo '</div>';
								endwhile;
							?>
						</div>
					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>
				</div>
				<?php get_template_part( 'template-parts/pagination' ); ?>
			</div>
			<?php Helper::right_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
