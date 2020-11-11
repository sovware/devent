<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$img = empty( Theme::$options['error_404img']['url'] ) ? Helper::get_img( '404.png' ) : Theme::$options['error_404img']['url'];
?>

<?php get_header(); ?>
<div id="primary" class="content-area error-page-area" style="background-image: url( <?php echo esc_url( $bgimg ); ?> );">
	<div class="container">
		<div class="error-page">
			<div class="error-page-img"><img src="<?php echo esc_url( $img ); ?>" alt="<?php esc_attr_e( '404', 'devent' ); ?>"></div>
			<?php if ( Theme::$options['error_title'] ) : ?>
				<h2><?php echo esc_html( Theme::$options['error_title'] ); ?></h2>
			<?php endif; ?>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
