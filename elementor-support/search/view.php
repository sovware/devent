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
			<img src="<?php echo Helper::get_img( 'home-bg.png' ); ?>" class="img-fluid" alt="<?php echo esc_attr( $alt ); ?>">
		</div>
	<?php } ?>
	<div class="container">
		<div class="row flex-lg-nowrap align-items-center">
			<div class="col-lg-10 offset-lg-1">
				<?php if ( $data['title1'] || $data['title2'] ) { ?>
					<div class="adv-filter__header">
						<div class="section-title">
							<h1><?php echo esc_attr( $data['title1'] ); ?></h1>
							<p><?php echo esc_attr( $data['title2'] ); ?></p>
						</div>
					</div>
				<?php } ?>
				<div class="adv-filter__left">
					<div class="adv-filter-content">
						<div class="row">
							<div class="col-lg-12">
								<div class="adv-filter-content__tab">
									<ul class="nav nav-pills" id="pills-tab" role="tablist">
										<li class="nav-item" role="presentation">
											<a class="nav-link active" id="pills-home-tab" data-toggle="pill"
												href="#pills-home" role="tab" aria-controls="pills-home"
												aria-selected="true"><i class="la la-bullhorn"></i> Events</a>
										</li>
										<li class="nav-item" role="presentation">
											<a class="nav-link" id="pills-profile-tab" data-toggle="pill"
												href="#pills-profile" role="tab" aria-controls="pills-profile"
												aria-selected="false"><i class="la la-home"></i> Venue</a>
										</li>
									</ul>
									<div class="tab-content" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel"
											aria-labelledby="pills-home-tab">
											<div class="adv-search-form">
												<div class="form-group adv-input-text">
													<input type="text" placeholder="Search events or categories">
												</div>
												<div class="form-group adv-input-location">
													<input type="text" placeholder="Any location">
												</div>
												<div class="form-group adv-input-date">
													<input type="text" id="adv-input-date" placeholder="Any Date">
												</div>
												<div class="form-group adv-search-btn">
													<button class="btn btn-primary">Search</button>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="pills-profile" role="tabpanel"
											aria-labelledby="pills-profile-tab">
											<div class="adv-search-form">
												<div class="form-group adv-input-text">
													<input type="text" placeholder="Search events or categories">
												</div>
												<div class="form-group adv-input-location">
													<input type="text" placeholder="Any location">
												</div>
												<div class="form-group adv-input-date">
													<input type="text" id="adv-input-date" placeholder="Any Date">
												</div>
												<div class="form-group adv-search-btn">
													<button class="btn btn-primary">Search</button>
												</div>
											</div>
										</div>
									</div>
								</div>
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
