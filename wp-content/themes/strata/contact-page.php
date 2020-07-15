<?php 
/*
Template Name: Contact Page
*/ 
?>
<?php
get_header();

$strata_options = strata_qode_return_global_options();
$qode_page_id   = strata_qode_get_page_id();

$hide_contact_form_website = "";
if (isset($strata_options['hide_contact_form_website'])) $hide_contact_form_website = $strata_options['hide_contact_form_website'];

$container_class = $strata_options['enable_google_map'] == "yes" ? "full_map" : '';
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part( 'title' ); ?>
		<?php if($strata_options['enable_google_map'] == "yes"){ ?>
			<div class="google_map" id="map_canvas"></div>
		<?php } ?>
	<div class="container" <?php strata_qode_inline_page_background_style( $qode_page_id ); ?>>
		<div class="container_inner <?php echo esc_attr($container_class); ?> clearfix">
				<div class="contact_detail">
					<?php if($strata_options['enable_contact_form'] == "yes"){ ?>
					<div class="two_columns_33_66 clearfix grid2">
						<div class="column1">
							<div class="column_inner">
								<div class="contact_info">
									<?php the_content(); ?>
								</div>	
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="contact_form">
									<h3><?php if($strata_options['contact_heading_above'] != "") { echo wp_kses_post( $strata_options['contact_heading_above'] );  } else { ?><?php esc_html_e('Contact Us', 'strata'); ?><?php } ?></h3>
									<form id="contact-form" method="post" action="">
										<div class="two_columns_50_50 clearfix">
											<div class="column1">
												<div class="column_inner">
													<input type="text" class="requiredField" name="fname" id="fname" value="" placeholder="&#xf007;&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e('First Name *', 'strata'); ?>" />
												</div>
											</div>
											<div class="column2">
												<div class="column_inner">
													<input type="text" class="requiredField" name="lname" id="lname" value="" placeholder="&#xf007;&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e('Last Name *', 'strata'); ?>" />
												</div>
											</div>
										</div>
										<?php if ($hide_contact_form_website == "yes") { ?>
											<input type="text" class="requiredField email" name="email" id="email" value="" placeholder="&#xf0e0;&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e('Email *', 'strata'); ?>" />
											<input type="hidden" name="website" id="website" value="" />
										<?php } else { ?>
										<div class="two_columns_50_50 clearfix">
											<div class="column1">
												<div class="column_inner">
													<input type="text" class="requiredField email" name="email" id="email" value="" placeholder="&#xf0e0;&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e('Email *', 'strata'); ?>" />
												</div>
											</div>
											<div class="column2">
												<div class="column_inner">
													<input type="text" name="website" id="website" value="" placeholder="&#xf0ac;&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e('Website', 'strata'); ?>" />
												</div>
											</div>
										</div>
										<?php }?>
										<textarea name="message" id="message" rows="10" placeholder="&#xf040;&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e('Message', 'strata'); ?>"></textarea>
										
										<?php if($strata_options['use_recaptcha'] == "yes" && strata_qode_is_core_installed() ) :
											require_once STRATA_CORE_MODULES_PATH . '/recaptchalib.php';
										
											if($strata_options['recaptcha_public_key']) {
												$publickey = $strata_options['recaptcha_public_key'];
											} else {
												$publickey = "6Ld5VOASAAAAABUGCt9ZaNuw3IF-BjUFLujP6C8L";
											}
											if($strata_options['recaptcha_private_key']) {
												$privatekey = $strata_options['recaptcha_private_key'];
											} else {
												$privatekey = "6Ld5VOASAAAAAKQdKVcxZ321VM6lkhBsoT6lXe9Z";
											}

											if($strata_options['page_transitions'] != ""){ ?>
												<script type="text/javascript">
													var RecaptchaOptions = {theme: 'clean'};
													Recaptcha.create("<?php echo esc_attr($publickey); ?>","captchaHolder",{theme: "clean",callback: Recaptcha.focus_response_field});
												</script>
											<?php } ?>
											<p id="captchaHolder"><?php echo recaptcha_get_html($publickey); ?></p>
											<p id="captchaStatus">&nbsp;</p>
										<?php endif; ?>
										
										<span class="submit_button_contact">
											<input class="qbutton" type="submit" value="<?php esc_attr_e('Send', 'strata'); ?>" />
										</span>
									</form>	
								</div>
							</div>
						</div>
					</div>
					<?php }  else { ?>
						<div class="contact_info">
							<?php the_content(); ?>
						</div>
					<?php } ?>
				</div>	
		</div>	
	</div>	
		
<?php endwhile; ?>
<?php endif; ?>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		"use strict";
		
		$j('form#contact-form').submit(function () {
			$j('form#contact-form .contact-error').remove();
			var hasError = false;
			$j('form#contact-form .requiredField').each(function () {
				if(jQuery.trim($j(this).val()) === '' || jQuery.trim($j(this).val()) === jQuery.trim($j(this).attr('placeholder'))){
					$j(this).parent().append('<strong class="contact-error"><?php esc_html_e( 'This is a required field', 'strata' ); ?></strong>');
					$j(this).addClass('inputError');
					hasError = true;
				} else {
					if ($j(this).hasClass('email')) {
						var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
						if (!emailReg.test(jQuery.trim($j(this).val()))) {
							$j(this).parent().append('<strong class="contact-error"><?php esc_html_e( 'Please enter a valid email address.', 'strata' ); ?></strong>');
							$j(this).addClass('inputError');
							hasError = true;
						}
					}
				}
			});
			
			if (!hasError) {
				var challengeField = $j("input#recaptcha_challenge_field").val();
				var responseField = $j("input#recaptcha_response_field").val();
				var name = $j("input#fname").val();
				var lname = $j("input#lname").val();
				var email = $j("input#email").val();
				var website = $j("input#website").val();
				var message = $j("textarea#message").val();
				
				var html = $j.ajax({
					type: "POST",
					url: "<?php echo strata_qode_is_core_installed() ? STRATA_CORE_MODULES_URL_PATH . '/ajax_mail.php' : '' ?>",
					data: "recaptcha_challenge_field=" + challengeField + "&recaptcha_response_field=" + responseField + "&name=" + name + "&lastname=" + lname + "&email=" + email + "&website=" + website + "&message=" + message,
					async: false
				}).responseText;
				
				if (html === "success") {
					var formInput = $j(this).serialize();
					
					$j("form#contact-form").before('<div class="contact-success"><strong><?php esc_html_e( 'THANK YOU!', 'strata' ); ?></strong><p><?php esc_html_e( 'Your email was successfully sent. We will contact you as soon as possible.', 'strata' ); ?></p></div>');
					$j("form#contact-form").hide();
					$j.post($j(this).attr('action'), formInput);
					hasError = false;
					return false;
				} else {
					<?php if ($strata_options['use_recaptcha'] == "yes") { ?>
					$j("#recaptcha_response_field").parent().append('<span class="contact-error extra-padding"><?php esc_html_e( 'Invalid Captcha', 'strata' ); ?></span>');
					Recaptcha.reload();
					<?php } else { ?>
					$j("form#contact-form").before('<div class="contact-success"><strong><?php esc_html_e( "Email server problem", 'strata' ); ?></strong></p></div>');
					<?php } ?>
					
					return false;
				}
			}
			return false;
		});
	});
</script>
<?php get_footer(); ?>