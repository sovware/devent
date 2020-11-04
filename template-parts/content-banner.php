<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$bg      = '';
$style_g = Helper::banner( 'blog_style', 'single_post_style', 'search_style', 'error_style', 'page_style' );
$style   = Theme::post_options( 'banner_style' );
$style   = ( 'default' === $style ) || is_404() ? $style_g : $style;
$style   = '2' === $style ? false : $style;

$bgtype = Helper::banner( 'blog_bgtype', 'single_post_bgtype', 'search_bgtype', 'error_bgtype', 'page_bgtype' );

if ( 'bgcolor' === $bgtype ) {
	$bgtype = Helper::banner( 'blog_bgcolor', 'single_post_bgcolor', 'search_bgcolor', 'error_bgcolor', 'page_bgcolor' );
	$bg     = 'style="background: ' . $bgtype . ';"';
} elseif ( 'bgimg' === $bgtype ) {
	$bgtype = Helper::banner( 'blog_bgimg', 'single_post_bgimg', 'search_bgimg', 'error_bgimg', 'page_bgimg' );
	$bgtype = $bgtype ? $bgtype['url'] : '';
	$bg     = 'style="background-image: url(' . $bgtype . ');"';
}

if ( has_post_thumbnail() && is_page() ) {
	$img_id = get_post_thumbnail_id() ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] : array();
	$bg     = 'style="background-image: url(' . $img_id . ');"';
}
?>

<?php if ( $style ) { ?>
<section class="breadcrumb" <?php echo wp_kses_post( $bg ); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="b-title">
					<h1><?php echo wp_kses_post( Helper::get_page_title() ); ?></h1>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
} else {
	?>
<section class="breadcrumb" <?php echo wp_kses_post( $bg ); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="b-title">
					<h1><?php echo wp_kses_post( Helper::get_page_title() ); ?></h1>
				</div>
				<div class="mt-30">
					<div class="breadcrumb-wrapper">
						<div class="search-wrapper looking-field">
							<div class="nav_right_module search_module">
								<div class="search_area">
									<form action="/">
										<div class="input-group input-group-light">
											<input type="text" class="form-control search_field top-search-field"
												placeholder="Looking for" autocomplete="off">
										</div>
									</form>
								</div>
							</div>
							<div class="search-categories">
								<ul class="list-unstyled">
									<li><a href="">Doctors</a></li>
									<li><a href="">Hospitals</a></li>
									<li><a href="">Bload Bank</a></li>
								</ul>
							</div>
						</div><!-- ends: .search-wrapper -->

						<div class="search-wrapper search-field">
							<div class="nav_right_module search_module">
								<div class="search_area">
									<form action="/">
										<div class="input-group input-group-light">
											<input type="text" class="form-control search_field top-search-field"
												placeholder="Search doctors, conditions & procedures"
												autocomplete="off">
										</div>
									</form>
								</div>
							</div>
							<div class="search-categories">
								<ul class="list-unstyled">
									<li><a href="">Top Searches</a></li>
									<li><a href="">Family Medicine</a></li>
									<li><a href="">Pediatrics</a></li>
									<li><a href="">Internal Medicine</a></li>
									<li><a href="">Dentistry</a></li>
									<li><a href="">Cardiology</a></li>
									<li><a href="">Orthopedic Surgery</a></li>
								</ul>
							</div>
						</div><!-- ends: .search-wrapper -->
					</div>

					<div class="breadcrumb-wrapper">
						<div class="search-wrapper address-field">
							<div class="nav_right_module search_module">
								<div class="search_area">
									<form action="/">
										<div class="input-group input-group-light">
											<input type="text" class="form-control search_field top-search-field"
												placeholder="Address, city, zip..." autocomplete="off">
										</div>
									</form>
								</div>
							</div>
							<div class="search-categories">
								<ul class="list-unstyled">
									<li><a href="">Recently Viewed</a></li>
									<li><a href="">New York, NY</a></li>
									<li><a href="">Los Angeles, CA</a></li>
									<li><a href="">San Diego, CA</a></li>
								</ul>
							</div>
						</div><!-- ends: .search-wrapper -->

						<button class="btn btn-secondary" type="submit"><i class="la la-search"></i>Search</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}