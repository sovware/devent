<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

?>
</div><!-- #content -->
<footer class="site-footer">
	<div class="container">
		<?php if ( Theme::$options['copyright_area'] ) : ?>
			<div class="footer-bottom-area">
				<div class="copyright-text"><?php echo wp_kses_post( Theme::$options['copyright_text'] ); ?></div>
			</div>
		<?php endif; ?>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
