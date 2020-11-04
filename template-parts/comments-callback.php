<?php

/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

?>
<li <?php comment_class(empty($args['has_children']) ? '' : 'depth-1'); ?> id="comment-<?php comment_ID(); ?>">
	<div class="media" id="div-comment-<?php comment_ID(); ?>">
		<div class="cmnt_avatar">
			<?php echo get_avatar($comment, 70, '', '', array('class' => 'media-object rounded-circle')); ?>
		</div>
		<div class="media-body">
			<div class="media_top">
				<div class="heading_left">
					<h6 class="media-heading"><?php echo get_comment_author(get_comment_ID()); ?></h6>
					<span><?php comment_date(); ?></span>
				</div>
				<div class="heading_left">
					<?php edit_comment_link('<span class="la la-edit"></span>' . esc_html__('Edit', 'devent')); ?>
					<?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'reply_text' => '<i class="la la-reply"> </i>' . esc_html__(' Reply', 'devent'),
								'depth'      => $depth,
								'max_depth'  => $args['max_depth'],
							)
						)
					);
					?>
				</div>
			</div>
			<?php if ('0' == $comment->comment_approved) : ?>
				<em class="comment-status-notice"><?php esc_html_e('Your comment is awaiting moderation.', 'devent'); ?></em>
			<?php endif; ?>
			<?php comment_text(); ?>
		</div>
	</div>