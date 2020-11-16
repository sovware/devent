<?php

/**
 * @author  AazzTech
 * @since   1.7.05
 * @version 1.0
 */

use AazzTech\FindBiz\Helper;

if ( ! Helper::directorist() ) {
	return;
}
if ( is_user_logged_in() ) {
	return;
}
$btn = get_option( 'findbiz' )['sign_in'];
if ( ! $btn ) {
	return;
}
$btn_text             = get_option( 'findbiz' )['sign_in_text'];
$display_password_reg = get_directorist_option( 'display_password_reg', 1 );
$register             = get_theme_mod( 'register_btn', 'Register' );
$social_login         = Helper::directorist() ? get_directorist_option( 'enable_social_login', 1 ) : '';
?>

<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title" id="login_modal_label"><?php echo esc_attr( $btn_text ); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<form action="login" id="dlist-login" method="post">
					<input type="text" class="form-control" id="dlist-username" name="username" placeholder="<?php echo esc_attr_x( 'Username or Email', 'placeholder', 'dlist' ); ?>" required>
					<input type="password" id="dlist-password" autocomplete="false" name="password" class="form-control" placeholder="<?php echo esc_attr_x( 'Password', 'placeholder', 'dlist' ); ?>" required>
					<button class="btn btn-block btn-primary" type="submit" name="submit"><?php echo esc_attr( $btn_text ); ?></button>
					<p class="status"></p>
					<div class="form-excerpts">
						<div class="keep_signed">
							<label for="keep_signed_in" class="not_empty">
								<input type="checkbox" id="dlist-keep_signed_in" value="1" name="keep_signed_in" checked="">
								<?php esc_html_e( 'Remember Me', 'dlist' ); ?>
								<span class="cf-select"></span>
							</label>
						</div>
						<a href="" class="recover-pass-link"><?php esc_html_e( 'Forgot your password?', 'dlist' ); ?></a>
					</div>
					<?php wp_nonce_field( 'ajax-login-nonce', 'dlist-security' ); ?>
				</form>

				<form method="post" id="dlist_recovery_password" class="recover-pass-form">
					<fieldset>
						<p> <?php esc_html_e( 'Please enter your username or email address. You will receive a link to create a new password via email.', 'dlist' ); ?></p>
						<label for="user_login"><?php esc_html_e( 'Username or E-mail:', 'dlist' ); ?></label>
						<?php $user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : ''; ?>
						<input type="text" name="dlist_recovery_user" class="dlist_recovery_user" id="user_login" value="<?php echo esc_attr( $user_login ); ?>" />
						<input type="hidden" name="action" value="reset" />
						<p class="recovery_status"></p>
						<button type="submit" class="btn btn-primary dlist_recovery_password" id="dlist-submit">Get New Password</button>
					</fieldset>
				</form>

				<?php
				if ( $social_login ) {
					?>
					<p class="social-connector text-center"><?php echo esc_html__( 'Or connect with', 'dlist' ); ?></p>
					<div class="social-login">
						<?php do_action( 'atbdp_before_login_form_end' ); ?>
					</div>
					<?php
				}
				?>

				<div class="form-excerpts">
					<ul class="list-unstyled">
						<li><?php esc_html_e( 'Not a member? ', 'dlist' ); ?>
							<a href="<?php echo ATBDP_Permalink::get_registration_page_link(); ?>" class="access-link" data-toggle="modal" data-target="#signup_modal" data-dismiss="modal"><?php echo __( 'Sign Up' ); ?></a>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-labelledby="signup_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="signup_modal_label"> <?php echo __( 'Sign Up' ); ?> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="vb-registration-form">

					<form class="form-horizontal registraion-form" role="form">

						<div class="form-group">
							<input type="email" name="vb_email" id="vb_email" value="" placeholder="<?php echo esc_html_x( 'Your Email', 'placeholder', 'dlist' ); ?>" class="form-control" required />
						</div>

						<div class="form-group">
							<input type="text" name="vb_username" id="vb_username" value="" placeholder="<?php echo esc_html_x( 'Choose Username', 'placeholder', 'dlist' ); ?>" class="form-control" />
						</div>

						<?php
						if ( ! empty( $display_password_reg ) ) {
							?>
							<div class="form-group">
								<input type="password" name="vb_password" id="vb_password" value="" placeholder="<?php echo esc_html_x( 'Password', 'placeholder', 'dlist' ); ?>" class="form-control" />
							</div>
							<?php
						}

						wp_nonce_field( 'vb_new_user', 'vb_new_user_nonce', true, true );
						$t_C_page_link     = ATBDP_Permalink::get_terms_and_conditions_page_url();
						$privacy_page_link = ATBDP_Permalink::get_privacy_policy_page_url();
						$policy            = get_directorist_option( 'registration_privacy', 1 );
						$terms             = get_directorist_option( 'regi_terms_condition', 1 );
						$and               = $policy && $terms ? ' & ' : '';

						if ( $policy || $terms ) {
							?>
							<div class="directory_regi_btn">
								<span class="atbdp_make_str_red"> *</span>
								<input id="privacy_policy" type="checkbox" name="privacy_policy">
								<label for="privacy_policy"> <?php _e( 'I agree to the', 'dlist' ); ?>
									<?php
									if ( $policy ) {
										?>
										<a style="color: red" target="_blank" href="<?php echo esc_url( $privacy_page_link ); ?>" id=""> <?php _e( 'Privacy', 'dlist' ); ?> </a>
										<?php
									}
									echo esc_attr( $and );
									if ( $terms ) {
										?>
										<a style="color: red" target="_blank" href="<?php echo esc_url( $t_C_page_link ); ?>" id="atbdp_reg_terms" <?php do_action( 'atbdp_reg_terms_a_attr' ); ?>>
											<?php _e( 'Terms', 'dlist' ); ?>
										</a>
									<?php } ?>
								</label>
							</div>
							<?php
						}
						?>

						<button type="submit" class="btn btn-block btn-primary" id="btn-new-user"><?php echo __( 'Sign Up' ); ?></button>
					</form>

					<div class="alert result-message"></div>
					<?php if ( $social_login ) { ?>
						<p class="social-connector text-center"><?php esc_html_e( 'Or connect with', 'dlist' ); ?></p>
						<div class="social-login">
							<?php do_action( 'atbdp_before_login_form_end' ); ?>
						</div>
						<?php
					}
					?>

					<div class="indicator"><?php esc_html_e( 'Please wait...', 'dlist' ); ?></div>

				</div>

				<div class="form-excerpts">
					<ul class="list-unstyled">
						<li>
							<?php esc_html_e( 'Already a member? ', 'dlist' ); ?>
							<a href="<?php echo ATBDP_Permalink::get_login_page_link(); ?>" class="access-link" data-toggle="modal" data-target="#login_modal" data-dismiss="modal"> <?php echo esc_attr( $btn_text ); ?></a>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
</div>
