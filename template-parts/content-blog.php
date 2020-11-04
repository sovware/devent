<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$thumb_size = Helper::has_sidebar() ? 'devent-size1' : 'devent-size2';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'devent_blog-card blog-each' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="blog-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( $thumb_size ); ?>
			</a>
		</div>
	<?php endif; ?>
	<div class="blog-content-area">
		<div class="blog-content">
			<?php if ( Theme::$options['blog_cats'] && has_category() ) : ?>
				<div class="blog-cats"><?php the_category(); ?></div>
			<?php endif; ?>
			<h2 class="blog-title"><a href="<?php the_permalink(); ?>" class="entry-title" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="blog-summary entry-summary"><?php the_excerpt(); ?></div>
		</div>
		<div class="blog-meta">
			<div class="blog-meta-left">
				<ul>
					<?php if ( Theme::$options['blog_author_name'] ) : ?>
						<li><i class="la la-user" aria-hidden="true"></i><span class="vcard author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="fn"><?php the_author(); ?></a></span></li>
					<?php endif; ?>
					<?php if ( Theme::$options['blog_date'] ) : ?>
						<li><i class="la la-calendar-check-o" aria-hidden="true"></i><span class="updated published"><?php the_time( get_option( 'date_format' ) ); ?></span></li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="blog-meta-right">
				<a href="<?php the_permalink(); ?>" class="blog-read-more"><?php esc_html_e( 'Read more...', 'devent' ); ?></a>
			</div>
		</div>		
	</div>
</article>
