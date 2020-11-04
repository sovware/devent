<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$thumb_size = 'devent-size1';

$author_id          = get_the_author_meta( 'ID' );
$author_name        = get_the_author_meta( 'display_name' );
$author_bio         = get_the_author_meta( 'description' );
$author_social_meta = get_the_author_meta( 'devent_user_socials' );

$author_socials = array();

if ( ! empty( $author_social_meta ) ) {
	$socials = Helper::user_socials();
	foreach ( $author_social_meta as $key => $value ) {
		if ( $value ) {
			$author_socials[ $key ] = array(
				'icon' => $socials[ $key ]['icon'],
				'link' => $value,
			);
		}
	}
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-single' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail"><?php the_post_thumbnail( $thumb_size ); ?></div>
	<?php endif; ?>
	<h1 class="blog-title"><a href="<?php the_permalink(); ?>" class="entry-title" rel="bookmark"><?php the_title(); ?></a></h1>
	<span class="entry-title d-none"><?php the_title(); ?></span>

	<div class="post-meta">
		<ul>
			<?php if ( Theme::$options['post_date'] ) : ?>
				<li><span class="updated published"><?php the_time( get_option( 'date_format' ) ); ?></span></li>
			<?php endif; ?>

			<?php if ( Theme::$options['post_author_name'] ) : ?>
				<li><?php esc_html_e( 'by', 'devent' ); ?> 
					<span class="vcard author">
						<a href="<?php echo get_author_posts_url( $author_id ); ?>" class="fn"><?php the_author(); ?></a>
					</span>
				</li>
			<?php endif; ?>

			<?php if ( Theme::$options['post_cats'] && has_category() ) : ?>
				<li><?php esc_html_e( 'in', 'devent' ); ?> <?php the_category( ', ' ); ?></li>
			<?php endif; ?>

			<?php if ( Theme::$options['post_comment_num'] ) : ?>
				<li>
				<?php
				comments_popup_link( esc_html__( 'No comments yet', 'devent' ), esc_html__( '1 comment', 'devent' ), esc_html__( '% comments', 'devent' ), 'comments-link point-dot', esc_html__( 'Comments are off', 'devent' ) );
				?>
				</li>
			<?php endif; ?>
		</ul>
	</div>

	<div class="post-content entry-content clearfix"><?php the_content(); ?></div>

	<div class="post-footer">
		<?php if ( Theme::$options['post_tags'] && has_tag() ) : ?>
			<div class="post-tags"><?php echo get_the_term_list( $post->ID, 'post_tag' ); ?></div>
		<?php endif; ?>

		<?php if ( Theme::$options['post_social'] ) : ?>
			<?php get_template_part( 'template-parts/social-share' ); ?>
		<?php endif; ?>	
	</div>


	<?php if ( Theme::$options['post_about_author'] && $author_bio ) : ?>
		<div class="post-author-block">
			<div class="post-author-left">
				<a href="<?php echo get_author_posts_url( $author_id ); ?>"><?php echo get_avatar( $author_id, 100 ); ?></a>
			</div>
			<div class="post-author-right">
				<h3 class="author-name"><span><?php esc_html_e( 'About', 'devent' ); ?></span> <?php echo esc_html( $author_name ); ?></h3>

				<div class="author-bio"><?php echo wp_kses_post( $author_bio ); ?></div>

				<?php if ( $author_socials ) : ?>
					<div class="author-social">
						<?php foreach ( $author_socials as $author_social ) : ?>
							<a href="<?php echo esc_url( $author_social['link'] ); ?>" target="_blank"><i class="fa <?php echo esc_attr( $author_social['icon'] ); ?>"></i></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php
	if ( Theme::$options['post_pagination'] ) {
		get_template_part( 'template-parts/content-single-pagination' );
	}

	if ( Theme::$options['post_related'] ) {
		get_template_part( 'template-parts/content-single-related' );
	}
	?>

</div>
