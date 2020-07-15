<?php
require_once( 'recaptchalib.php' );
require( '../../../../wp-blog-header.php' );
global $qode_options_theme13;

$publickey  = $qode_options_theme13['recaptcha_public_key'];
$privatekey = $qode_options_theme13['recaptcha_private_key'];

if ( $publickey == "" ) {
	$publickey = "6Ld5VOASAAAAABUGCt9ZaNuw3IF-BjUFLujP6C8L";
}
if ( $privatekey == "" ) {
	$privatekey = "6Ld5VOASAAAAAKQdKVcxZ321VM6lkhBsoT6lXe9Z";
}

$use_captcha = $qode_options_theme13['use_recaptcha'];
$resp        = $use_captcha !== 'no' ? recaptcha_check_answer( $privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"] ) : false;

if ( isset( $_POST ) && ! empty( $_POST ) && ( ( $resp && $resp->is_valid ) || $use_captcha == "no" ) ) {?>success<?php
	$email_to   = sanitize_email( $qode_options_theme13['receive_mail'] );
	$email_from = sanitize_email( $qode_options_theme13['email_from'] );
	$subject    = sanitize_text_field( $qode_options_theme13['email_subject'] );
	$name       = sanitize_text_field( $_POST["name"] );
	$lastname   = sanitize_text_field( $_POST["lastname"] );
	
	$text = "Name: " . $name . " " . $lastname . "\n";
	$text .= "Email: " . sanitize_email( $_POST["email"] ) . "\n";
	$text .= "WebSite: " . esc_url( $_POST["website"] ) . "\n";
	$text .= "Message: " . sanitize_textarea_field( $_POST["message"] );
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/plain; charset=utf-8" . "\r\n";
	$headers .= "From: '".$name." ".$lastname."' <".$email_from."> " . "\r\n";
	$result = wp_mail( $email_to, $subject, $text, $headers );
	if ( ! $result ) {
		global $phpmailer;
		var_dump( $phpmailer->ErrorInfo );
	}
	
} else {
	die ( sprintf( esc_html__( "The reCAPTCHA wasn't entered correctly. Go back and try it again. (reCAPTCHA said: %s)", "strata-core" ), $resp->error ) );
}