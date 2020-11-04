<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

get_header();
?>


<?php
if ( Helper::using_elementor() ) {
	while ( have_posts() ) {
		the_post();
		the_content();
	}
} else {
	?>
	<div id="primary" class="content-area section-padding">
		<div class="container">
			<div class="row">
				<?php Helper::left_sidebar(); ?>
				<div class="<?php Helper::the_layout_class(); ?>">
					<div class="main-content">
						<?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content', 'page' );
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						}
						?>
					</div>
				</div>
				<?php Helper::right_sidebar(); ?>
			</div>
		</div>
	</div>
	<?php
}

get_footer();
