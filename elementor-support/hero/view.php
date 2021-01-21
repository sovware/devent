<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

use AazzTech\devent\Helper;
?>
<div class="adv-filter">
	<div class="container">
		<div class="row flex-lg-nowrap align-items-center">
			<div class="col-lg-10 offset-lg-1">
				<?php if ( $data['title'] || $data['subtitle'] ) { ?>
					<div class="adv-filter__header">
						<div class="section-title">
							<h1><?php echo esc_attr( $data['title'] ); ?></h1>
							<p><?php echo esc_attr( $data['subtitle'] ); ?></p>
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
												aria-selected="true">
												<i class="<?php echo esc_attr( $data['tab1_icon'] ); ?>"></i>
												<?php echo esc_attr( $data['tab1'] ); ?>
											</a>
										</li>
										<li class="nav-item" role="presentation">
											<a class="nav-link" id="pills-profile-tab" data-toggle="pill"
												href="#pills-profile" role="tab" aria-controls="pills-profile"
												aria-selected="false">
												<i class="<?php echo esc_attr( $data['tab2_icon'] ); ?>"></i>
												<?php echo esc_attr( $data['tab2'] ); ?>
											</a>
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
													<button class="btn btn-primary"><?php echo esc_attr( $data['search'] ); ?></button>
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
													<button class="btn btn-primary"><?php echo esc_attr( $data['search'] ); ?></button>
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
		</div>
	</div>
</div>
