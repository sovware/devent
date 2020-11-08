<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

use AazzTech\devent\Helper;

$imgs = $data['img'];
$img  = $imgs['url'] ? $imgs['url'] : '';
$alt  = $imgs['id'] ? $imgs['id'] : '';
?>
<div class="adv-filter">
	<?php if ( $img ) { ?>
		<div class="adv-filter__bg">
			<img src="<?php echo Helper::get_img( 'shape.png' ); ?>" class="img-fluid" alt="<?php echo esc_attr( $alt ); ?>">
		</div>
	<?php } ?>
	<div class="container">
		<div class="row flex-lg-nowrap align-items-center">
			<div class="adv-xl-6 col-lg-6 order-lg-1 order-2">
				<?php if ( $data['title1'] || $data['title2'] ) { ?>
					<div class="adv-filter__header">
						<div class="section-title">
							<p><?php echo esc_attr( $data['title1'] ); ?></br><strong><?php echo esc_attr( $data['title2'] ); ?></strong></p>
						</div>
					</div>
				<?php } ?>
				<div class="adv-filter__left">
					<div class="adv-filter-content">
						<div class="row">
							<div class="col-lg-12">
								<div class="adv-filter-content__tab">
									<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
										<li class="nav-item" role="presentation">
											<a class="nav-link active" id="pills-home-tab" data-toggle="pill"
												href="#pills-home" role="tab" aria-controls="pills-home"
												aria-selected="true">Buy</a>
										</li>
										<li class="nav-item" role="presentation">
											<a class="nav-link" id="pills-profile-tab" data-toggle="pill"
												href="#pills-profile" role="tab" aria-controls="pills-profile"
												aria-selected="false">Rent</a>
										</li>
									</ul>
									<div class="tab-content" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel"
											aria-labelledby="pills-home-tab">
											<div class="row">
												<div class="col-lg-6">
													<div class="search-wrapper adv-looking-field">
														<!-- Start Event Area -->
														<select class="js-example-basic-single js-states form-control"
															id="adv-looking-field">
															<option value="all">Any Make</option>
															<option value="1">Acura</option>
															<option value="2">Alfa Romeo</option>
															<option value="3">Audi</option>
															<option value="4">BMW</option>
															<option value="5">Buick</option>
															<option value="6">Cadillac</option>
														</select>
														<!-- End Event Area -->
													</div><!-- ends: .search-wrapper -->
												</div>
												<div class="col-lg-6">
													<div class="search-wrapper adv-search-field">
														<!-- Start Event Area -->
														<select class="js-example-basic-single js-states form-control"
															id="adv-search-field">
															<option value="all">Any Modal</option>
															<option value="1">All Modals</option>
															<option value="2">Integra</option>
															<option value="3">Legend</option>
															<option value="4">MDX</option>
															<option value="5">NSX</option>
															<option value="6">NSXT</option>
														</select>
														<!-- End Event Area -->
													</div><!-- ends: .search-wrapper -->
												</div>
												<div class="col-lg-6">
													<div class="search-wrapper adv-address-field">
														<div class="nav_right_module search_module">
															<form action="/">
																<input type="text"
																	class="form-control search_field top-search-field"
																	placeholder="Address, city, zip..."
																	autocomplete="off">
															</form>
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
												</div>
												<div class="col-lg-6">
													<div class="price-range-slider">
														<p class="range-value">
															<span>Price ranges:</span>
															<input type="text" id="amount" readonly>
														</p>
														<div id="slider-range" class="range-bar"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="pills-profile" role="tabpanel"
											aria-labelledby="pills-profile-tab">
											<div class="row">
												<div class="col-lg-6"></div>
												<div class="col-lg-6"></div>
												<div class="col-lg-6"></div>
												<div class="col-lg-6"></div>
											</div>
										</div>
									</div>
								</div>
								<?php if ( $data['search'] ) { ?>
									<a href="#" class="btn btn-primary btn-md content-center mt-10 adv-filter__btn">
										<i class="las la-search"></i><?php echo esc_attr( $data['search'] ); ?>
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php if ( $img ) { ?>
				<div class="adv-xl-8 col-lg-5 order-lg-2 order-lg-1">
					<div class="adv-filter__right">
						<div class="adv-filter__image">
							<img src="<?php echo esc_url( $img ); ?>" class="img-fluid" alt="<?php echo esc_attr( $alt ); ?>">
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
