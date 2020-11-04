<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$url   = urlencode( get_permalink() );
$title = urlencode( get_the_title() );

$all = array(
	'facebook'  => array(
		'url'  => "http://www.facebook.com/sharer.php?u=$url",
		'icon' => 'fa-facebook',
	),
	'twitter'   => array(
		'url'  => "https://twitter.com/intent/tweet?source=$url&text=$title:$url",
		'icon' => 'fa-twitter',
	),
	'linkedin'  => array(
		'url'  => "http://www.linkedin.com/shareArticle?mini=true&url=$url&title=$title",
		'icon' => 'fa-linkedin',
	),
	'pinterest' => array(
		'url'  => "http://pinterest.com/pin/create/button/?url=$url&description=$title",
		'icon' => 'fa-pinterest',
	),
	'tumblr'    => array(
		'url'  => "http://www.tumblr.com/share?v=3&u=$url &quote=$title",
		'icon' => 'fa-tumblr',
	),
	'reddit'    => array(
		'url'  => "http://www.reddit.com/submit?url=$url&title=$title",
		'icon' => 'fa-reddit',
	),
	'vk'        => array(
		'url'  => "http://vkontakte.ru/share.php?url=$url",
		'icon' => 'fa-vk',
	),
);

$selected = Theme::$options['post_share'];

$sharers = array();

if ( $selected ) {
	foreach ( $selected as $value ) {
		$sharers[ $value ] = $all[ $value ];
	}
}

$sharers = apply_filters( 'aztheme_social_sharing_icons', $sharers );

if ( $selected ) {
	?>
	<div class="post-social">
		<h3 class="post-social-title"><?php esc_html_e( 'Share On:', 'devent' ); ?></h3>
		<div class="post-social-sharing">
			<?php foreach ( $sharers as $key => $sharer ) : ?>
				<a href="<?php echo esc_url( $sharer['url'] ); ?>" target="_blank"><i class="fa <?php echo esc_attr( $sharer['icon'] ); ?>"></i></a>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}
