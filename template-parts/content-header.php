<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$reg           = '';
$add           = '';
$logo          = Helper::get_logo_src();
$nav_menu_args = Helper::get_nav_menu_args();

if ( is_directorist() ) {
	$reg = \ATBDP_Permalink::get_registration_page_link();
	$add = \ATBDP_Permalink::get_add_listing_page_link();
}

$user_id     = get_user_meta( get_current_user_id(), 'pro_pic', true );
$profile_img = wp_get_attachment_image_src( $user_id );
$avatar_img  = get_avatar( get_current_user_id(), 40, null, null, array( 'class' => 'img-fluid' ) );
?>
<div class="dashboard-off-canvas-main">
	<aside class="js-offcanvas offcanvas-dashboard" data-offcanvas-options='{"modifiers":"right,overlay"}' id="right"
		role="complementary">
		<button class="js-offcanvas-close btn btn-secondary btn-lg btn-block"
			data-button-options='{"modifiers":"m1,m2"}'>Close</button>
		<div class="notification-area-sidebar">
			<ul id="accordionExample">
				<li>
					<button class="messages" type="button" data-toggle="collapse" data-target="#collapseOne"
						aria-expanded="true" aria-controls="collapseOne">
						<i class="la la-envelope"></i>
					</button>

					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
						data-parent="#accordionExample">
						<div class="notification-dropdown-menu">
							<a href="#"><i class="la la-list-alt"></i>Listing</a>
							<a href="#"><i class="la la-calendar-check-o"></i>My Appointment</a>
							<a href="#"><i class="la la-heart-o"></i>Bookmarks</a>
							<a href="#"><i class="la la-bell"></i>Notifications</a>
							<a href="#"><i class="la la-envelope"></i>Messages</a>
							<a href="#"><i class="la la-money"></i>Billings</a>
							<a href="#"><i class="la la-cog"></i>Account Settings</a>
							<a href="#"><i class="la la-power-off"></i> Logout</a>
						</div>
					</div>
				</li>

				<li>
					<button class="notification-icon collapsed" type="button" data-toggle="collapse"
						data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						<i class="la la-bell"></i>
					</button>

					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="notification-dropdown-menu">
							<a href="#"><i class="la la-list-alt"></i>Listing</a>
							<a href="#"><i class="la la-calendar-check-o"></i>My Appointment</a>
							<a href="#"><i class="la la-heart-o"></i>Bookmarks</a>
							<a href="#"><i class="la la-bell"></i>Notifications</a>
							<a href="#"><i class="la la-envelope"></i>Messages</a>
							<a href="#"><i class="la la-money"></i>Billings</a>
							<a href="#"><i class="la la-cog"></i>Account Settings</a>
							<a href="#"><i class="la la-power-off"></i> Logout</a>
						</div>
					</div>
				</li>

				<li>
					<button class="notification collapsed" type="button" data-toggle="collapse"
						data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						<img src="img/dashboard-1.png" class-"img-fluid" alt="">
					</button>

					<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
						data-parent="#accordionExample">
						<div class="notification-dropdown-menu author-dropdown-menu">
							<div class="author-user d-none">
								<img src="img/dashboard-1.png" class-"img-fluid" alt="">
								<h6>Dr. Eli Rosen</h6>
							</div>

							<a href="#"><i class="la la-list-alt"></i>Listing</a>
							<a href="#"><i class="la la-calendar-check-o"></i>My Appointment</a>
							<a href="#"><i class="la la-heart-o"></i>Bookmarks</a>
							<a href="#"><i class="la la-star-o"></i></i>My Reviews</a>
							<a href="#"><i class="la la-bell"></i>Notifications</a>
							<a href="#"><i class="la la-envelope"></i>Messages</a>
							<a href="#"><i class="la la-money"></i>Billings</a>
							<a href="#"><i class="la la-user"></i>My Profile</a>

							<a class="btn" href="#" role="button"><i class="la la-power-off"></i> Logout</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</aside>
</div>
<div class="menu-bar menu--light menu-area-sticky fixed-top headroom">
	<!-- fixed-top -->
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light d-flex align-items-center">
			<?php
			if ( $logo ) {
				?>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo esc_url( $logo ); ?>" class="img-fluid"
						alt="<?php esc_attr( bloginfo( 'name' ) ); ?>">
				</a>
				<?php
			} elseif ( get_bloginfo( 'name' ) || get_bloginfo( 'description' ) ) {
				?>
				<div class="site-identify">
					<h1 class="site-title">
						<a id="site_title_color" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
					<p id="site_tagline_color" class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>
				<?php
			}
			?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Start Advanced search -->
				<div class="location">
					<div class="event-option arrow-default arrow-cross-none mr-3">
						<select class="js-example-basic-single js-states form-control" id="event-locations">
							<?php
							$args       = array(
								'orderby'  => 'count',
								'parent'   => 0,
								'number'   => 5,
								'taxonomy' => ATBDP_LOCATION,
							);
							$categories = get_categories( $args );
							foreach ( $categories as $cats ) {
								$link = is_directorist() ? \ATBDP_Permalink::atbdp_get_category_page( (object) $cats ) : '';
								?>
								<option value="all"><i class="la la-map-marker"></i><?php echo sprintf( '<a href="%s">%s</a>', esc_url( $link ), esc_attr( $cats->name ) ); ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="adv_search align-items-center d-xl-flex d-none mr-30">
					<!-- Start Event Area -->
					<div class="event-option arrow-default arrow-cross-none mr-3">
						<select class="js-example-basic-single js-states form-control" id="event-option">
							<option value="all">Event</option>
							<option value="JAN">Venue</option>
						</select>
					</div>
					<!-- End Event Area -->
					<!-- Start Search Bar -->
					<div class="search w-100 d-xl-block d-none">
						<div class="search-wrapper w-100">
							<div class="search_module position-relative">
								<form action="#">
									<div class="input-group">
										<input type="text"
											class="border-0 shadow-none top-search-field font-size14 text-lighten bg-transparent"
											placeholder="Search for events..." autocomplete="off">
									</div>
								</form>
							</div>
							<div class="search-categories">
								<div class="search__menu">
									<a class="dropdown-item search__item" href="#">Education</a>
									<a class="dropdown-item search__item" href="#">Technology</a>
									<a class="dropdown-item search__item" href="#">Food & Drink</a>
									<a class="dropdown-item search__item" href="#">Business</a>
									<a class="dropdown-item search__item" href="#">Health</a>
									<a class="dropdown-item search__item" href="#">Other</a>
								</div>
							</div>
						</div>
					</div>
					<!-- End Search bar-->
				</div>
				<!-- End Advanced search -->
				<div class="main-menu ml-auto">

					<?php wp_nav_menu( $nav_menu_args ); ?>

					<?php if ( is_directorist() ) { ?>
						<div class="menubar-btn">
							<?php if ( Theme::$options['add_listing_button'] ) { ?>
							<a href="<?php echo esc_url( $add ); ?>" class="btn btn-primary menu-doctor-btn" role="button"
								aria-pressed="true">
								<?php echo esc_html( Theme::$options['add_listing_button_text'] ); ?>
							</a>
							<?php } ?>
							<?php if ( ! is_user_logged_in() && Theme::$options['login_button'] ) { ?>
								<div class="btn-group login-area  d-lg-block d-none">
									<div role="button"
										class="dropdown-toggle dropdown-toggle-split shadow-none cursor pr-0 pl-xl-30 pl-15"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="far fa-user"></i>
									</div>
									<div class="dropdown-menu dropdown-menu-right login-area__menu">
										<a class="dropdown-item login-area__item" href="#" data-toggle="modal"
											data-target="#exampleModalCenter"><?php echo esc_attr( Theme::$options['login_button_text'] ); ?></a>
										<a class="dropdown-item login-area__item" href="#">Register</a>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>

			<?php if ( is_directorist() ) { ?>
			<div class="nav-right-side-content d-none">
				<div class="search-bar-wrapper">
					<div class="nav_right_module search_module">
						<span class="la search_trigger la-search"></span>
						<div class="search_area_inner">
							<div class="search-wrapper looking-field">
								<div class="nav_right_module search_module">
									<div class="search_area">
										<form action="/">
											<div class="input-group input-group-light">
												<span class="la search_trigger la-search"></span>
												<input type="text" class="form-control search_field top-search-field"
													placeholder="Search doctors, conditions or procedures"
													autocomplete="off">
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
							</div>
						</div>
					</div>
				</div>
			</div>
				<?php
			}
			?>

			<div class="dashboard-off-canvas-main">
				<main class="c-offcanvas-content-wrap" role="main">
					<div class="o-wrapper">
						<a class="js-offcanvas-trigger" data-offcanvas-trigger="right" id="#test" href="#right">
							<i class="la la-user"></i>
						</a>
					</div>
				</main>
			</div>

			<?php if ( is_directorist() ) { ?>
			<div class="menubar-lg-btn d-lg-flex d-none align-items-center">
				<?php if ( ! is_user_logged_in() && Theme::$options['login_button'] ) { ?>
					<div class="btn-group login-area  d-lg-block d-none">
						<a class="btn btn-primary menu-doctor-btn" href="#" data-toggle="modal"
							data-target="#login_modal"> 
							<?php echo esc_attr( Theme::$options['login_button_text'] ); ?>
						</a>
						<a class="btn btn-primary menu-doctor-btn" href="#" data-toggle="modal"
							data-target="#signup_modal">Register</a>
					</div>

				<?php } ?>
				<?php if ( Theme::$options['add_listing_button'] ) { ?>
				<a href="<?php echo esc_url( $add ); ?>" class="btn btn-primary menu-doctor-btn fw-600 text-capitalize"
					role="button" aria-pressed="true">
					<?php echo esc_html( Theme::$options['add_listing_button_text'] ); ?>
				</a>
				<?php } ?>
			</div>
			<?php } ?>
			<!-- modal -->
			<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal_label"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title fw-700" id="login_modal_label">
								<i class="la la-lock"></i>
								Login
							</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="login" id="direo-login" class="direo-login" method="post">
								<input type="text" class="form-control" id="direo-username" name="username"
									placeholder="Username or Email" required>
								<input type="password" id="direo-password" autocomplete="false" name="password"
									class="form-control" placeholder="Password" required>
								<button class="btn content-center btn-lg w-100 fw-600 btn-gradient btn-gradient-two"
									type="submit" name="submit">Login</button>
								<p class="status"></p>
								<div class="form-excerpts">
									<div class="custom-control custom-checkbox keep_signed">
										<input type="checkbox" class="custom-control-input" id="direo-keep_signed_in"
											name="keep_signed_in">
										<label class="custom-control-label not_empty"
											for="direo-keep_signed_in">Remember Me </label>
									</div>
									<a href="" class="recover-pass-link">Forgot your password?</a>
								</div>
								<input type="hidden" id="direo-security" name="direo-security" value="21f0084d3f" />
								<input type="hidden" name="_wp_http_referer" value="/theme/direo/" />
							</form>
							<form method="post" id="direo_recovery_password" class="recover-pass-form">
								<fieldset>
									<p>Please enter your username or email address. You will receive a link to
										create a new password via email. </p>
									<label for="user_login">E-mail:</label>
									<input type="text" name="direo_recovery_user" class="direo_recovery_user"
										id="user_login" value="" />
									<input type="hidden" name="action" value="reset" />
									<p class="recovery_status"></p>
									<button type="submit" class="btn btn-primary direo_recovery_password"
										id="direo-submit">Get New Password</button>
								</fieldset>
							</form>
							<p class="social-connector text-center">
								<span>Or connect with</span>
							</p>
							<div class="social-login  m-n1 py-3">
								<button type="button" class="btn btn btn-outline-primary m-1">
									<span class="azbdp-fb-loading">
										<span class="fa fa-spin fa-spinner"></span>
									</span>
									<span class="fa fa-facebook"></span>
									Facebook
								</button>
								<button type="button" class="btn btn btn-outline-secondary m-1">
									<span class="azbdp-gg-loading">
										<span class="fa fa-spin fa-spinner"></span>
									</span>
									<span class="fa fa-google"></span>
									Google
								</button>
							</div>
							<div class="form-excerpts">
								<ul class="list-unstyled">
									<li>
										Not a member? <a href="#" class="access-link" data-toggle="modal"
											data-target="#signup_modal" data-dismiss="modal">Register </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-labelledby="signup_modal_label"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title fw-700" id="signup_modal_label">
								<i class="la la-lock"></i>
								Register
							</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="vb-registration-form">
								<form class="form-horizontal registraion-form" role="form">
									<div class="form-group">
										<input type="text" name="vb_username" id="vb_username" value=""
											placeholder="Username" class="form-control" />
									</div>
									<div class="form-group">
										<input type="email" name="vb_email" id="vb_email" value=""
											placeholder="Your Email" class="form-control" required />
									</div>
									<div class="form-group">
										<input type="password" name="vb_password" id="vb_password" value=""
											placeholder="Password" class="form-control" />
									</div>
									<input type="hidden" id="vb_new_user_nonce" name="vb_new_user_nonce"
										value="b272233ae9" />
									<input type="hidden" name="_wp_http_referer" value="/theme/direo/" />
									<div class="directory_regi_btn mb-10 d-flex">
										<span class="atbdp_make_str_red mr-1">*</span>
										<div class="custom-control custom-checkbox keep_signed">
											<input type="checkbox" class="custom-control-input" id="devent-register"
												name="keep_signed_in">
											<label class="custom-control-label not_empty" for="devent-register">I
												agree to the <a class="color-secondary" target="_blank" href="#">Privacy
												</a>
												&amp;<a class="color-secondary" target="_blank" href="#">Terms
												</a></label>
										</div>
									</div>
									<button type="submit"
										class="btn btn btn-primary content-center btn-lg w-100 fw-600 btn-gradient btn-gradient-two"
										id="btn-new-user">Register </button>
								</form>
							</div>
							<p class="social-connector text-center">
								<span>Or connect with</span>
							</p>
							<div class="social-login m-n1 py-3">
								<button type="button" class="btn btn-outline-primary m-1">
									<span class="azbdp-fb-loading">
										<span class="fa fa-spin fa-spinner"></span>
									</span>
									<span class="fa fa-facebook"></span>
									Facebook
								</button>
								<button type="button" class="btn btn-outline-secondary m-1">
									<span class="azbdp-gg-loading">
										<span class="fa fa-spin fa-spinner"></span>
									</span>
									<span class="fa fa-google"></span>
									Google
								</button>
							</div>
							<div class="form-excerpts">
								<ul class="list-unstyled">
									<li>
										Already a member? <a href="#" class="access-link" data-toggle="modal"
											data-target="#login_modal" data-dismiss="modal">Login</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if ( is_directorist() && is_user_logged_in() ) { ?>
			<div class="notification-area">
				<ul>
					<li>
						<a class="notification" href="#">
							<?php
							if ( empty( $profile_img ) ) {
								echo wp_kses_post( $avatar_img );
							} else {
								echo sprintf( '<img src="%s" alt="%s" class="img-fluid"/>', esc_url( $profile_img[0] ), esc_attr( Helper::image_alt( $user_id ) ) );
							}
							?>
						</a>

						<div class="notification-dropdown-menu author-dropdown-menu">
							<div class="author-user">
								<?php
									$author_name = get_the_author_meta( 'display_name', $post->post_author );
								if ( ! $profile_img ) {
									echo wp_kses_post( $avatar_img );
								} else {
									echo sprintf( '<img width="65" src="%s" alt="%s" class="img-fluid rounded-circle"/>', esc_url( $profile_img[0] ), esc_attr( Helper::image_alt( $user_id ) ) );
								}
									echo $author_name ? '<h6>' . esc_attr( $author_name ) . '</h6>' : '';
								?>
							</div>

							<a href="#"><i class="la la-list-alt"></i>Listing</a>
							<a href="#"><i class="la la-calendar-check-o"></i>My Appointment</a>
							<a href="#"><i class="la la-heart-o"></i>Bookmarks</a>
							<a href="#"><i class="la la-star-o"></i></i>My Reviews</a>
							<a href="#"><i class="la la-bell"></i>Notifications</a>
							<a href="#"><i class="la la-envelope"></i>Messages</a>
							<a href="#"><i class="la la-money"></i>Billings</a>
							<a href="#"><i class="la la-user"></i>My Profile</a>
							<a class="btn" href="#" role="button"><i class="la la-power-off"></i> Logout</a>
						</div>
					</li>
				</ul>
			</div>
			<?php } ?>
		</nav>
	</div>
</div>
