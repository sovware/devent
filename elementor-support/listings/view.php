<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;
?>

<!-- Start Listing Grid -->
<section class="listing-grid">
	<div class="container">
		<div class="title text-center">
			<h1>The best doctors bear you</h1>
		</div>

		<div class="listing-grid-wrapper">
			<div class="filters">
				<ul>
					<li class="active" data-filter="*">All</li>
					<li data-filter=".family">Family Doctor</li>
					<li data-filter=".gynecologist">Gynecologist</li>
					<li data-filter=".dentist">Dentist</li>
					<li data-filter=".orthopedic">Orthopedic Surgeon</li>
					<li data-filter=".cardiologist">Cardiologist</li>
					<li data-filter=".dermatologist">Dermatologist</li>
					<li data-filter=".pediatrician">Pediatrician</li>
					<div class="dropdown">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span></span>
							<span></span>
							<span></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="#">Family Medicine</a>
							<a class="dropdown-item" href="#">Pediatrics</a>
							<a class="dropdown-item" href="#">Internal Medicine</a>
							<a class="dropdown-item" href="#">Dentistry</a>
							<a class="dropdown-item" href="#">Cardiology</a>
							<a class="dropdown-item" href="#">Orthopedic Surgery</a>
						</div>
					</div>
				</ul>
			</div>

			<div class="filters-content listing-grid-inner">
				<div class="row grid">
					<div class="col-lg-4 col-sm-6 col-md-6 all family gynecologist">
						<div class="item listing-grid-box">
							<div class="listing-grid-img">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/img/listing/1.jpg" class="img-fluid" alt="Work 1">

								<div class="clean-icon">
									<span class="check-icon"><i class="la la-check"></i> Accepting new
										patients</span>
									<span class="favorite-icon"><i class="la la-heart-o"></i></span>
								</div>
							</div>

							<div class="listing-grid-box-inner">
								<div class="upper-badge">
									<span class="badge badge-featured">Featured</span>
									<span class="badge badge-verified">Verified</span>
								</div>

								<div class="box-title">
									<a href="#">
										<h6>Dr. Nichelle Wilson</h6>
									</a>
									<p>Pediatric Cardiology | Male | Age 39</p>
								</div>

								<div class="listing-data-list">
									<ul>
										<li>
											<p><span class="la la-phone"></span><a href="tel:(718) 701-4925">(718)
													701-4925</a></p>
										</li>
										<li>
											<p><span class="la la-map-marker"></span>506 6th St, Brooklyn, NY 11215
											</p>
										</li>
									</ul>
								</div>

								<div class="box-footer">
									<div class="rating">
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star-half-o active"></i>
										<i class="la la-star-o"></i>
										<span>65 reviews</span>
									</div>

									<div class="box-btn">
										<a href="#" class="btn btn-transparent">Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-sm-6 col-md-6 all dentist cardiologist">
						<div class="item listing-grid-box">
							<div class="listing-grid-img">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/img/listing/2.jpg" class="img-fluid" alt="Work 1">

								<div class="clean-icon">
									<span class="check-icon"><i class="la la-check"></i> Accepting new
										patients</span>
									<span class="favorite-icon"><i class="la la-heart-o"></i></span>
								</div>
							</div>

							<div class="listing-grid-box-inner">
								<div class="upper-badge">
									<span class="badge badge-featured">Featured</span>
									<span class="badge badge-verified">Verified</span>
								</div>

								<div class="box-title">
									<a href="#">
										<h6>Dr. Nichelle Wilson</h6>
									</a>
									<p>Pediatric Cardiology | Male | Age 39</p>
								</div>

								<div class="listing-data-list">
									<ul>
										<li>
											<p><span class="la la-phone"></span><a href="tel:(718) 701-4925">(718)
													701-4925</a></p>
										</li>
										<li>
											<p><span class="la la-map-marker"></span>506 6th St, Brooklyn, NY 11215
											</p>
										</li>
									</ul>
								</div>

								<div class="box-footer">
									<div class="rating">
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star-half-o active"></i>
										<i class="la la-star-o"></i>
										<span>65 reviews</span>
									</div>

									<div class="box-btn">
										<a href="#" class="btn btn-transparent">Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-sm-6 col-md-6 all psychologist orthopedic">
						<div class="item listing-grid-box">
							<div class="listing-grid-img">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/img/listing/3.jpg" class="img-fluid" alt="Work 1">

								<div class="clean-icon">
									<span class="check-icon"><i class="la la-check"></i> Accepting new
										patients</span>
									<span class="favorite-icon"><i class="la la-heart-o"></i></span>
								</div>
							</div>

							<div class="listing-grid-box-inner">
								<div class="upper-badge">
									<span class="badge badge-featured">Featured</span>
									<span class="badge badge-verified">Verified</span>
								</div>

								<div class="box-title">
									<a href="#">
										<h6>Dr. Nichelle Wilson</h6>
									</a>
									<p>Pediatric Cardiology | Male | Age 39</p>
								</div>

								<div class="listing-data-list">
									<ul>
										<li>
											<p><span class="la la-phone"></span><a href="tel:(718) 701-4925">(718)
													701-4925</a></p>
										</li>
										<li>
											<p><span class="la la-map-marker"></span>506 6th St, Brooklyn, NY 11215
											</p>
										</li>
									</ul>
								</div>

								<div class="box-footer">
									<div class="rating">
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star-half-o active"></i>
										<i class="la la-star-o"></i>
										<span>65 reviews</span>
									</div>

									<div class="box-btn">
										<a href="#" class="btn btn-transparent">Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-sm-6 col-md-6 all dentist dermatologist">
						<div class="item listing-grid-box">
							<div class="listing-grid-img">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/img/listing/4.jpg" class="img-fluid" alt="Work 1">

								<div class="clean-icon">
									<span class="check-icon"><i class="la la-check"></i> Accepting new
										patients</span>
									<span class="favorite-icon"><i class="la la-heart-o"></i></span>
								</div>
							</div>

							<div class="listing-grid-box-inner">
								<div class="upper-badge">
									<span class="badge badge-featured">Featured</span>
									<span class="badge badge-verified">Verified</span>
								</div>

								<div class="box-title">
									<a href="#">
										<h6>Dr. Nichelle Wilson</h6>
									</a>
									<p>Pediatric Cardiology | Male | Age 39</p>
								</div>

								<div class="listing-data-list">
									<ul>
										<li>
											<p><span class="la la-phone"></span><a href="tel:(718) 701-4925">(718)
													701-4925</a></p>
										</li>
										<li>
											<p><span class="la la-map-marker"></span>506 6th St, Brooklyn, NY 11215
											</p>
										</li>
									</ul>
								</div>

								<div class="box-footer">
									<div class="rating">
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star-half-o active"></i>
										<i class="la la-star-o"></i>
										<span>65 reviews</span>
									</div>

									<div class="box-btn">
										<a href="#" class="btn btn-transparent">Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-sm-6 col-md-6 all family dermatologist">
						<div class="item listing-grid-box">
							<div class="listing-grid-img">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/img/listing/5.jpg" class="img-fluid" alt="Work 1">

								<div class="clean-icon">
									<span class="check-icon"><i class="la la-check"></i> Accepting new
										patients</span>
									<span class="favorite-icon"><i class="la la-heart-o"></i></span>
								</div>
							</div>

							<div class="listing-grid-box-inner">
								<div class="upper-badge">
									<span class="badge badge-featured">Featured</span>
									<span class="badge badge-verified">Verified</span>
								</div>

								<div class="box-title">
									<a href="#">
										<h6>Dr. Nichelle Wilson</h6>
									</a>
									<p>Pediatric Cardiology | Male | Age 39</p>
								</div>

								<div class="listing-data-list">
									<ul>
										<li>
											<p><span class="la la-phone"></span><a href="tel:(718) 701-4925">(718)
													701-4925</a></p>
										</li>
										<li>
											<p><span class="la la-map-marker"></span>506 6th St, Brooklyn, NY 11215
											</p>
										</li>
									</ul>
								</div>

								<div class="box-footer">
									<div class="rating">
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star-half-o active"></i>
										<i class="la la-star-o"></i>
										<span>65 reviews</span>
									</div>

									<div class="box-btn">
										<a href="#" class="btn btn-transparent">Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-sm-6 col-md-6 all pediatrician gynecologist">
						<div class="item listing-grid-box">
							<div class="listing-grid-img">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/img/listing/1.jpg" class="img-fluid" alt="Work 1">

								<div class="clean-icon">
									<span class="check-icon"><i class="la la-check"></i> Accepting new
										patients</span>
									<span class="favorite-icon"><i class="la la-heart-o"></i></span>
								</div>
							</div>

							<div class="listing-grid-box-inner">
								<div class="upper-badge">
									<span class="badge badge-featured">Featured</span>
									<span class="badge badge-verified">Verified</span>
								</div>

								<div class="box-title">
									<a href="#">
										<h6>Dr. Nichelle Wilson</h6>
									</a>
									<p>Pediatric Cardiology | Male | Age 39</p>
								</div>

								<div class="listing-data-list">
									<ul>
										<li>
											<p><span class="la la-phone"></span><a href="tel:(718) 701-4925">(718)
													701-4925</a></p>
										</li>
										<li>
											<p><span class="la la-map-marker"></span>506 6th St, Brooklyn, NY 11215
											</p>
										</li>
									</ul>
								</div>

								<div class="box-footer">
									<div class="rating">
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star active"></i>
										<i class="la la-star-half-o active"></i>
										<i class="la la-star-o"></i>
										<span>65 reviews</span>
									</div>

									<div class="box-btn">
										<a href="#" class="btn btn-transparent">Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 d-flex justify-content-center">
						<a href="#" class="btn btn-white">View all doctors</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Listing Grid -->
