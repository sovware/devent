<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	the_content();

	wp_link_pages(
		array(
			'before'      => '<div class="page-links">',
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		)
	);
	?>
</div>
