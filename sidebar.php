<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

?>
<div class="<?php Helper::the_sidebar_class(); ?>">
	<aside class="sidebar-widget-area">
		<?php
		do_action( 'aztheme_before_sidebar' );

		dynamic_sidebar( Helper::sidebar() );

		do_action( 'aztheme_after_sidebar' );
		?>
	</aside>
</div>
