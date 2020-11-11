<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

if ( post_password_required() ) {
	return;
}

if ( ! have_comments() && ! comments_open() ) {
	return;
}

$comments_number = get_comments_number();
$comments_text   = sprintf( _n( '%s Comment', '%s Comments', $comments_number, 'devent' ), number_format_i18n( $comments_number ) );
$comment_args    = array(
	'callback' => 'AazzTech\devent\Helper::comments_callback',
);

$comment_field       = '<div class="col-12">
						<textarea name="comment" placeholder="' . esc_attr_x( 'Your Text', 'placeholder', 'devent' ) . '" class="form-control mb-30"></textarea>
					</div>';
$comment_form_fields = array(
	'author'        => '<div class="col-md-6">
							<input name="author" type="text" placeholder="' . esc_attr_x( 'Name*', 'placeholder', 'devent' ) . '" class="form-control mb-30" required>
						</div>',
	'email'         => '<div class="col-md-6">
    						<input name="email" type="email" placeholder="' . esc_attr_x( 'Email*', 'placeholder', 'devent' ) . '" class="form-control mb-30" required>
    					</div>',
	'comment_field' => '<div class="col-12">
    						<textarea name="comment" placeholder="' . esc_attr_x( 'Your Text', 'placeholder', 'devent' ) . '" class="form-control mb-30"></textarea>
    					</div>',
	'url'           => '',
	'cookies'       => '',
);

$comment_form_args = array(
	'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="btn btn-primary %3$s" value="' . esc_attr_x( 'Post Comment', 'submit 	button', 'devent' ) . '">',
	'submit_field'         => '<div class="col-12"><p class="form-submit mb-0">%1$s %2$s</p></div>',
	'title_reply_before'   => '<h3 class="mb-15">',
	'title_reply_after'    => '</h3>',
	'class_form'           => 'comment_form_wrapper row',
	'fields'               => apply_filters( 'comment_form_default_fields', $comment_form_fields ),
	'comment_field'        => is_user_logged_in() ? $comment_field : '',
	'comment_notes_before' => '<div class="col-12">
									<p class="comment-notes mb-40">
										<span id="email-notes">' . esc_html__( 'Your email address will not be published.', 'direo' ) . '</span>' .
									'</p>
								</div>',
);
?>

<?php if ( have_comments() ) : ?>
	<div class="comments-area" id="comments">
		<div class="comment-title">
			<h3><?php echo esc_html( $comments_text ); ?></h3>
		</div>

		<?php if ( get_comments_number() >= 1 ) { ?>
			<div class="comment-lists">
				<ul class="media-list list-unstyled">
					<?php wp_list_comments( $comment_args ); ?>
				</ul>
			</div>
			<?php
		}
		?>
		<div class="comment-pagination">
			<nav class="navigation pagination d-flex justify-content-center" role="navigation">
				<div class="nav-links">
					<?php
					paginate_comments_links(
						array(
							'prev_text' => '<span class="la la-long-arrow-left"></span>',
							'next_text' => '<span class="la la-long-arrow-right"></span>',
						)
					);
					?>
				</div>
			</nav>
		</div>
	</div>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<?php comment_form( $comment_form_args ); ?>
<?php else : ?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'devent' ); ?></p>
	<?php
endif;
