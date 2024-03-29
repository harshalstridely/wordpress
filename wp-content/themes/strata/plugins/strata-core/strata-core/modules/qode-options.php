<?php
include_once('google-fonts.php');

if (!function_exists ('add_action')) {
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
}
global $qode_options_theme13;
$qode_options_theme13  = get_option('qode_options_theme13');



class Qode_Theme_Options {

	/*** qode options class constructor, alse compatible for PHP4 ***/
	function __construct() {
		add_action('admin_menu', array(&$this, 'qode_admin_menu'));
		add_action('admin_init', array(&$this, 'register_qode_theme_settings'));
	}

	function init_qode_theme_options() {
		global $qode_options_theme13;
		if(isset($qode_options_theme13['reset_to_defaults'])){ 
			if( $qode_options_theme13['reset_to_defaults'] == 'yes' ) delete_option( "qode_options_theme13");
		}
		if (! get_option("qode_options_theme13")) {
			add_option( "qode_options_theme13",
				array(
					"reset_to_defaults" => '',
					"first_color" => '',
					"first_color_gradient" => '',
					"first_gradient_border" => '',
					"second_color" => '',
					"second_color_gradient" => '',
					"second_gradient_border" => '',
					"third_color" => '',
					"fourth_color" => '',
					"background_color" => '',
					"background_color_box" => '',
					"background_color_boxes" => '',
					"highlight_color" => '',
					"selection_color" => '',
					"favicon_image" => QODE_ROOT."/img/favicon.ico",
					"background_image" => '',
					"patern_background_image" => '',
					"google_fonts" => '-1',
					"page_transitions" => '0',
					"boxed" => 'no',
					"loading_animation" => 'off',
					"qode_like" => 'on',
					"portfolio_qode_like" => 'on',
					"loading_image" => '',
					"smooth_scroll" => 'yes',
					"responsiveness" => 'yes',
					"show_back_button" => 'yes',
					"elements_animation_on_touch" => 'no',
					"parallax_speed" => '1',
					"parallax_minheight" => '400',
					"parallax_onoff" => 'on',
					"google_maps_api_key" => '',
					"internal_no_ajax_links" => '',
					"custom_css" => '',
					"custom_js" => '',
					"meta_keywords" => '',
					"meta_description" => '',
					"disable_qode_seo" => 'no',
					"h1_color" => '',
					"h1_google_fonts" => '-1',
					"h1_fontsize" => '',
					"h1_lineheight" => '',
					"h1_fontstyle" => '',
					"h1_fontweight" => '',
					"h2_color" => '',
					"h2_google_fonts" => '-1',
					"h2_fontsize" => '',
					"h2_lineheight" => '',
					"h2_fontstyle" => '',
					"h2_fontweight" => '',
					"h3_color" => '',
					"h3_google_fonts" => '-1',
					"h3_fontsize" => '',
					"h3_lineheight" => '',
					"h3_fontstyle" => '',
					"h3_fontweight" => '',
					"h4_color" => '',
					"h4_google_fonts" => '-1',
					"h4_fontsize" => '',
					"h4_lineheight" => '',
					"h4_fontstyle" => '',
					"h4_fontweight" => '',
					"h5_color" => '',
					"h5_google_fonts" => '-1',
					"h5_fontsize" => '',
					"h5_lineheight" => '',
					"h5_fontstyle" => '',
					"h5_fontweight" => '',
					"h6_color" => '',
					"h6_google_fonts" => '-1',
					"h6_fontsize" => '',
					"h6_lineheight" => '',
					"h6_fontstyle" => '',
					"h6_fontweight" => '',
					"h6_letterspacing" => '',
					"text_color" => '',
					"text_google_fonts" => '-1',
					"text_fontsize" => '',
					"text_lineheight" => '',
					"text_fontstyle" => '',
					"text_fontweight" => '',
					"text_margin" => '',
					"link_color" => '',
					"link_hovercolor" => '',
					"link_fontstyle" => '',
					"link_fontweight" => '',
					"link_fontdecoration" => '',
					"page_title_color" => '',
					"page_title_google_fonts" => '-1',
					"page_title_fontsize" => '',
					"page_title_lineheight" => '',
					"page_title_fontstyle" => '',
					"page_title_fontweight" => '',
					"info_data_color" => '',
					"info_data_google_fonts" => '-1',
					"info_data_fontsize" => '',
					"info_data_icon_color" => '',
					"info_data_fontstyle" => '',
					"info_data_fontweight" => '',
					"menu_color" => '',
					"menu_hovercolor" => '',
					"menu_google_fonts" => '-1',
					"menu_fontsize" => '',
					"menu_lineheight" => '',
					"menu_fontstyle" => '',
					"menu_fontweight" => '',
					"header_in_grid" => 'yes',
					"header_top_area" => 'no',
					"header_top_area_scroll" => 'no',
					"enable_breadcrumbs" => 'yes',
					"enable_search" => 'no',
					"header_bottom_appearance" => 'fixed',
					"header_style" => '',
					"menu_position" => '',
					"header_top_background_color" => '',
					"header_background_color" => '',
					"header_background_color_scroll" => '',
					"header_background_color_sticky" => '',
					"header_background_transparency_initial" => '',
					"header_background_transparency_scroll" => '',
					"header_background_transparency_sticky" => '',
					"header_border_transparency_initial" => '',
					"logo_image" => QODE_ROOT."/img/logo.png",
					"logo_image_light" => QODE_ROOT."/img/logo.png",
					"logo_image_dark" => QODE_ROOT."/img/logo_black.png",
					"logo_image_sticky" => QODE_ROOT."/img/logo_black.png",
					"center_logo_image" => 'no',
					"header_height" => '',
					"header_height_scroll" => '',
					"header_height_sticky" => '',
					"scroll_amount_for_sticky" => '',
					"dropdown_background_color" => '',
					"dropdown_background_transparency" => '',
					"dropdown_color" => '',
					"dropdown_hovercolor" => '',
					"dropdown_google_fonts" => '-1',
					"dropdown_fontsize" => '',
					"dropdown_lineheight" => '',
					"dropdown_fontstyle" => '',
					"dropdown_fontweight" => '',
					"dropdown_color_thirdlvl" => '',
					"dropdown_hovercolor_thirdlvl" => '',
					"dropdown_google_fonts_thirdlvl" => '-1',
					"fixed_google_fonts" => '-1',
					"dropdown_fontsize_thirdlvl" => '',
					"dropdown_lineheight_thirdlvl" => '',
					"dropdown_fontstyle_thirdlvl" => '',
					"dropdown_fontweight_thirdlvl" => '',
					"sticky_color" => '',
					"sticky_hovercolor" => '',
					"sticky_google_fonts" => '-1',
					"sticky_fontsizel" => '',
					"sticky_lineheight" => '',
					"sticky_fontstyle" => '',
					"sticky_fontweight" => '',
					"mobile_color" => '',
					"mobile_hovercolor" => '',
					"mobile_google_fonts" => '-1',
					"mobile_fontsize" => '',
					"mobile_lineheight" => '',
					"mobile_fontstyle" => '',
					"mobile_fontweight" => '',
					"mobile_separator_color" => '',
					"mobile_background_color" => '',
					"mobile_letter_spacing" => '',
					"header_separator_color" => '',
					"animate_title_area" => 'no',
					"title_text_shadow" => 'no',
					"title_background_color" => '',
					"responsive_title_image" => '',
					"fixed_title_image" => '',
					"title_image" => '',
					"title_overlay_image" => '',
					"title_height" => '',
					"page_title_position" => 'left',
					"predefined_title_sizes" => 'small',
					"uncovering_footer" => 'yes',
					"footer_in_grid" => 'no',
					"footer_text" => 'yes',
					"show_footer_top" => 'yes',
					"footer_top_columns" => '5',
					"footer_separator_color" => '',
					"footer_top_title_color" => '',
					"footer_top_text_color" => '',
					"footer_link_color" => '',
					"footer_link_hover_color" => '',
					"footer_top_background_color" => '',
					"footer_bottom_text_color" => '',
					"footer_bottom_background_color" => '',
					"enable_side_area" => 'yes',
					"side_area_title" => '',
					"side_area_background_color" => '',
					"side_area_text_color" => '',
					"side_area_title_color" => '',
					"separator_thickness" => '',
					"separator_topmargin" => '',
					"separator_bottommargin" => '',
					"button_title_color" => '',
					"button_title_hovercolor" => '',
					"button_title_google_fonts" => '-1',
					"button_title_fontsize" => '',
					"button_title_lineheight" => '',
					"button_title_fontstyle" => '',
					"button_title_fontweight" => '',
					"button_size" => '',
					"button_backgroundcolor_hover" => '',
					"button_border_color" => '',
					"button_bottom_gradient_color" => '',
					"button_top_gradient_color" => '',
					"message_title_color" => '',
					"message_title_google_fonts" => '-1',
					"message_title_fontsize" => '',
					"message_title_lineheight" => '',
					"message_title_fontstyle" => '',
					"message_title_fontweight" => '',
					"message_backgroundcolor" => '',
					"message_bordercolor" => '',
					"message_icon_color" => '',
					"message_icon_fontsize" => '',
					"blockquote_font_color" => '',
					"blockquote_border_color" => '',
					"blockquote_background_color" => '',
					"blockquote_quote_icon_color" => '',
					"pricing_table_top_color" => '',
					"pricing_table_bottom_color" => '',
					"pricing_table_border_color" => '',
					"social_icon_color" => '',
					"social_icon_top_gradient_background_color" => '',
					"social_icon_bottom_gradient_background_color" => '',
					"social_icon_border_color" => '',
					"smooth_background_color" => '',
					"smooth_bar_color" => '',
					"portfolio_style" => '1',
					"lightbox_single_project" => 'no',
					"portfolio_columns_number" => '2',
					"portfolio_single_slug" => '',
					"blog_quote_link_box_color" => '',
					"pagination" => '1',
					"blog_style" => '1',
					"category_blog_sidebar" => 'default',
					"blog_hide_comments" => 'no',
					"blog_page_range" => '',
					"number_of_chars" => '45',
					"number_of_chars_masonry" => '',
					"number_of_chars_large_image" => '',
					"number_of_chars_small_image" => '',
					"blog_single_sidebar" => 'default',
					"blog_single_sidebar_custom_display" => '',
					"blog_author_info" => 'no',
					"receive_mail" => '',
					"enable_contact_form" => 'no',
					"hide_contact_form_website" => 'no',
					"email_from" => '',
					"email_subject" => '',
					"use_recaptcha" => 'no',
					"recaptcha_public_key" => '',
					"recaptcha_private_key" => '',
					"contact_heading_above" => '',
					"enable_google_map" => 'no',
					"google_maps_pin_image" => QODE_ROOT."/img/pin.png",
					"google_maps_address" => '',
					"google_maps_address2" => '',
					"google_maps_address3" => '',
					"google_maps_address4" => '',
					"google_maps_address5" => '',
					"google_maps_zoom" => '12',
					"google_maps_height" => '750',
					"google_maps_style" => 'yes',
					"google_maps_color" => '',
					"google_maps_scroll_wheel" => 'no',
					"google_maps_iframe" => '',
					"404_title" => '',
					"404_subtitle" => '',
					"404_text" => '',
					"404_backlabel" => '',
					"enable_social_share" => 'no',
					"enable_facebook_share" => 'no',
					"enable_twitter_share" => 'no',
					"enable_google_plus" => 'no',
					"enable_linkedin" => 'no',
					"enable_tumblr" => 'no',
					"enable_pinterest" => 'no',
					"enable_vk" => 'no',
					"facebook_icon" => '',
					"twitter_icon" => '',
					"google_plus_icon" => '',
					"linkedin_icon" => '',
					"tumblr_icon" => '',
					"pinterest_icon" => '',
					"vk_icon" => '',
					"twitter_via" => ''
				)
			);
		} 
	}

	function register_qode_theme_settings() {
	    register_setting( 'qode_options_theme13_page', 'qode_options_theme13', array(&$this, 'validate_options') );
	}
	/*** Add Option to admin sidebar ***/
	function qode_admin_menu() {
		$this->init_qode_theme_options();
		$this->pagehook = add_menu_page('Qode Theme', esc_html__('Qode Options', 'strata-core'), 'manage_options', 'qode_options_theme13_page', array(&$this, 'qode_generate_options_page'));
		add_action('load-'.$this->pagehook, array(&$this, 'on_load_page'));
	}

	function on_load_page() {
		
		/*** add default wordpress meta boxes ***/
		add_meta_box('qode-general-options-metabox', esc_html__('Options', 'strata-core'), array(&$this, 'general_options_contentbox'), $this->pagehook, 'normal', 'core');
	
	}

	function qode_generate_options_page() {

		/***  Option for number of columns ***/
		global $screen_layout_columns, $qode_options_theme13;
		
		/*** Saved options message ***/
		if ( isset( $_REQUEST['settings-updated'] ) || isset( $_REQUEST['updated'] ) ) {
			echo '<div id="message" class="updated fade"><p><strong>' . esc_html__( 'Settings saved.', 'strata-core' ) . '</strong></p></div>';
			
			do_action( 'strata_qode_action_after_theme_option_save' );
		}
		?>
		<div id="qode-metaboxes-general" class="wrap">
		    <div style="float:left; padding:10px 10px 10px 0;"></div>
			<?php $current_theme = wp_get_theme(); ?>
		    <h2 style="padding-top:25px;"><?php echo esc_attr($current_theme->get('Name').' - '.$current_theme->get('Version')); ?></h2>

		    <form method="post" action="options.php">
<?php			settings_fields( 'qode_options_theme13_page' );
				$options = get_option('qode_options_theme13');
				wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false );
				wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>

			<div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">
				<div id="post-body" class="has-sidebar">
					<div id="post-body-content" class="has-sidebar-content">
<?php					    do_meta_boxes($this->pagehook, 'normal', $options); ?>
<?php					    do_meta_boxes($this->pagehook, 'additional', $options); ?>
					    <fieldset style="margin:2px 0 0;"><legend class="screen-reader-text"><span><?php esc_attr_e('Reset to defaults', 'strata-core') ?></span></legend>
						<label for="reset_to_defaults">
						    <input name="qode_options_theme13[reset_to_defaults]" type="checkbox" id="reset_to_defaults" value="yes" />
						    <?php esc_attr_e('Reset to defaults', 'strata-core') ?>
						</label>
					    </fieldset>
					    <p class="submit">
						<input type="hidden" id="qode_submit" value="1" name="qode_submit" />
						<input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('Save Changes', 'strata-core') ?>" />
					    </p>
					</div>
				</div>
				<br class="clear"/>
			</div>
		    </form>
		</div>
		<script type="text/javascript">
		    //<![CDATA[
		    jQuery(document).ready( function($) {
			    // close qode postboxes
			    $('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			    // qode postboxes setup
			    postboxes.add_postbox_toggles('<?php echo esc_attr($this->pagehook); ?>');
		    });
		    //]]>
		</script>
<?php	}

	/***  Validate number option  ***/
	function validate_options( $input ) {
	global $qode_options_theme13;
		$input['number_of_chars'] = is_numeric( $input['number_of_chars'] ) ? absint($input['number_of_chars']) : $qode_options_theme13['number_of_chars'];
		return $input;
	}

	/*** Fields and html for meta boxes ***/

	function general_options_contentbox( $options ) {
		global $fontArrays;
	?>

		<div class="sections">
			<h3><?php esc_html_e( 'Global options', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('First main color', 'strata-core'); ?></td>
							<td>
								<div>
									<?php esc_html_e('Main color (also Gradient top)', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['first_color']){ echo 'background-color:'.esc_attr($options['first_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[first_color]" type="text" value="<?php if ($options['first_color']) { echo esc_attr($options['first_color']); } ?>" size="30" maxlength="100" />
									<?php esc_html_e('Default main color', 'strata-core'); ?>
									<div class="inline" style="vertical-align:middle; margin: 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #00aeef;" title="#00aeef"></span></div>
								</div>
								<br/>
								<div>
									<?php esc_html_e('Gradient bottom', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['first_color_gradient']){ echo 'background-color:'.esc_attr($options['first_color_gradient']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[first_color_gradient]" type="text" value="<?php if (isset($options['first_color_gradient'])) { echo esc_attr($options['first_color_gradient']); } ?>" size="30" maxlength="100" />
									<?php esc_html_e('Default bottom gradient color', 'strata-core'); ?>
									<div class="inline" style="vertical-align:middle; margin: 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #009ad4;" title="#009ad4"></span></div>
								</div>
								<br/>
								<div>
									<?php esc_html_e('Gradient Border', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['first_gradient_border']){ echo 'background-color:'.esc_attr($options['first_gradient_border']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[first_gradient_border]" type="text" value="<?php if (isset($options['first_gradient_border'])) { echo esc_attr($options['first_gradient_border']); } ?>" size="30" maxlength="100" />
									<?php esc_html_e('Default gradient border color', 'strata-core'); ?>
									<div class="inline" style="vertical-align:middle; margin: 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #049cd4;" title="#049cd4"></span></div>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Second main color', 'strata-core'); ?></td>
							<td>
								<div>
									<?php esc_html_e('Second main color (also Gradient top)', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['second_color']){ echo 'background-color:'.esc_attr($options['second_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[second_color]" type="text" value="<?php if ($options['second_color']) { echo esc_attr($options['second_color']); } ?>" size="30" maxlength="100" />
									<?php esc_html_e('Default second main color', 'strata-core'); ?>
									<div class="inline" style="vertical-align:middle; margin: 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #ededed; background-color: #f3f3f3;" title="#f3f3f3"></span></div>
								</div>
								<br/>
								<div>
									<?php esc_html_e('Gradient bottom', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['second_color_gradient']){ echo 'background-color:'.esc_attr($options['second_color_gradient']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[second_color_gradient]" type="text" value="<?php if (isset($options['second_color_gradient'])) { echo esc_attr($options['second_color_gradient']); } ?>" size="30" maxlength="100" />
									<?php esc_html_e('Default bottom gradient color', 'strata-core'); ?>
									<div class="inline" style="vertical-align:middle; margin: 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #ededed; background-color: #f9f9f9;" title="#f9f9f9"></span></div>
								</div>
								<br/>
								<div>
									<?php esc_html_e('Gradient Border', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['second_gradient_border']){ echo 'background-color:'.esc_attr($options['second_gradient_border']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[second_gradient_border]" type="text" value="<?php if (isset($options['second_gradient_border'])) { echo esc_attr($options['second_gradient_border']); } ?>" size="30" maxlength="100" />
									<?php esc_html_e('Default second border color', 'strata-core'); ?>
									<div class="inline" style="vertical-align:middle; margin: 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #eaeaea;" title="#eaeaea"></span></div>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Third main color', 'strata-core'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['third_color']){ echo 'background-color:'.esc_attr($options['third_color']).';'; } ?>"></div></div>
								<input name="qode_options_theme13[third_color]" type="text" value="<?php if(isset($options['third_color'])){ if ($options['third_color']) { echo esc_attr($options['third_color']); } } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default third main color', 'strata-core'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #ededed; background-color: #fbfbfb;" title="#fbfbfb"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Fourth main color', 'strata-core'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['fourth_color']){ echo 'background-color:'.esc_attr($options['fourth_color']).';'; } ?>"></div></div>
								<input name="qode_options_theme13[fourth_color]" type="text" value="<?php if(isset($options['fourth_color'])){ if ($options['fourth_color']) { echo esc_attr($options['fourth_color']); } } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default fourth main color', 'strata-core'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #333;" title="#333"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background color (content)', 'strata-core'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['background_color']){ echo 'background-color:'.esc_attr($options['background_color']).';'; } ?>"></div></div>
								<input name="qode_options_theme13[background_color]" type="text" value="<?php if ($options['background_color']) { echo esc_attr($options['background_color']); } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default background color', 'strata-core'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #e0dede; background-color: #fff;" title="#fff"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background color (body)', 'strata-core'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['background_color_box']){ echo 'background-color:'.esc_attr($options['background_color_box']).';'; } ?>"></div></div>
								<input name="qode_options_theme13[background_color_box]" type="text" value="<?php if (isset($options['background_color_box'])) { echo esc_attr($options['background_color_box']); } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default boxed background color', 'strata-core'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #e0dede; background-color: #fff;" title="#fff"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background boxes color', 'strata-core'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if (isset($options['background_color_boxes']) && $options['background_color_boxes']){ echo 'background-color:'.esc_attr($options['background_color_boxes']).';'; } ?>"></div></div>
								<input name="qode_options_theme13[background_color_boxes]" type="text" value="<?php if (isset($options['background_color_boxes'])) { echo esc_attr($options['background_color_boxes']); } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Background color for boxes (blog, portfolio...)', 'strata-core'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #ededed; background-color: #fff;" title="#fff"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Highlight color', 'strata-core'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['highlight_color']){ echo 'background-color:'.esc_attr($options['highlight_color']).';'; } ?>"></div></div>
								<input name="qode_options_theme13[highlight_color]" type="text"  value="<?php if ($options['highlight_color']) { echo esc_attr($options['highlight_color']); } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default highlight color', 'strata-core'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #00aeef;" title="#00aeef"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Selection color', 'strata-core'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['selection_color']){ echo 'background-color:'.esc_attr($options['selection_color']).';'; } ?>"></div></div>
								<input name="qode_options_theme13[selection_color]" type="text"  value="<?php if ($options['selection_color']) { echo esc_attr($options['selection_color']); } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default selection color', 'strata-core'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #00aeef;" title="#00aeef"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background image', 'strata-core'); ?></td>
							<td>
								<div class="inline" style="width: 705px;">
								<input type="text" id="background_image" name="qode_options_theme13[background_image]" class="background_image" value="<?php if (isset($options['background_image'])) { echo esc_attr($options['background_image']); } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Pattern background image', 'strata-core'); ?></td>
							<td>
								<div class="inline" style="width: 705px;">
								<input type="text" id="pattern_background_image" name="qode_options_theme13[pattern_background_image]" class="pattern_background_image" value="<?php if (isset($options['pattern_background_image'])) { echo esc_attr($options['pattern_background_image']); } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Favicon image', 'strata-core'); ?></td>
							<td>
								<div class="inline" style="width: 705px;">
								<input type="text" id="favicon_image" name="qode_options_theme13[favicon_image]" class="favicon_image" value="<?php if ($options['favicon_image']) { echo esc_attr($options['favicon_image']); } else { echo QODE_ROOT."/img/favicon.ico"; } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Google fonts', 'strata-core'); ?></td>
								<td>
							<select name="qode_options_theme13[google_fonts]">
							<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
							<?php foreach($fontArrays as $fontArray) { ?>
								<option <?php if ($options['google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
							<?php } ?>

							</select>
							<?php esc_html_e('Choose Font', 'strata-core'); ?>
								</td>
						</tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Page transition', 'strata-core'); ?></td>
								<td>
							<select name="qode_options_theme13[page_transitions]">
								<option <?php if ($options['page_transitions'] == 0) { echo "selected='selected'"; } ?> value="0"><?php esc_html_e( 'No animation', 'strata-core' ); ?></option>
								<option <?php if ($options['page_transitions'] == 1) { echo "selected='selected'"; } ?> value="1"><?php esc_html_e( 'Up/Down', 'strata-core' ); ?></option>
								<option <?php if ($options['page_transitions'] == 2) { echo "selected='selected'"; } ?> value="2"><?php esc_html_e( 'Fade', 'strata-core' ); ?></option>
								<option <?php if ($options['page_transitions'] == 3) { echo "selected='selected'"; } ?> value="3"><?php esc_html_e( 'Up/Down (In) / Fade (Out)', 'strata-core' ); ?></option>
								<option <?php if ($options['page_transitions'] == 4) { echo "selected='selected'"; } ?> value="4"><?php esc_html_e( 'Left/Right', 'strata-core' ); ?></option>
							</select>
							<?php esc_html_e('In order for animation to work properly, you must choose "Post name" in permalinks settings', 'strata-core'); ?>
								</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Boxed', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[boxed]">
									<option <?php if(isset($options['boxed'])){ $boxed = $options['boxed']; if ($boxed == 'no') { echo "selected='selected'"; } }  ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['boxed'])){ $boxed = $options['boxed']; if ($boxed == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Loading animation', 'strata-core'); ?></td>
								<td>
									<select name="qode_options_theme13[loading_animation]">
										<option <?php if (isset($options['loading_animation'])){ $loading_animation = $options['loading_animation']; if ($loading_animation == 'on') { echo "selected='selected'"; } } ?> value="on"><?php esc_html_e( 'On', 'strata-core' ); ?></option>
										<option <?php if (isset($options['loading_animation'])){ $loading_animation = $options['loading_animation']; if ($loading_animation == 'off') { echo "selected='selected'"; } } ?> value="off"><?php esc_html_e( 'Off', 'strata-core' ); ?></option>
									</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Loading image', 'strata-core'); ?></td>
							<td>
								<div class="inline" style="width: 705px;">
								<input type="text" id="loading_image" name="qode_options_theme13[loading_image]" class="loading_image" value="<?php if (isset($options['loading_image']) && $options['loading_image'] != "") { echo esc_attr($options['loading_image']); } else { echo ""; } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Smooth scroll', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[smooth_scroll]">
									<option <?php if(isset($options['smooth_scroll'])){ $smooth_scroll = $options['smooth_scroll']; if ($smooth_scroll == 'no') { echo "selected='selected'"; } }  ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['smooth_scroll'])){ $smooth_scroll = $options['smooth_scroll']; if ($smooth_scroll == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									<option <?php if(isset($options['smooth_scroll'])){ $smooth_scroll = $options['smooth_scroll']; if ($smooth_scroll == 'yes_not_ios') { echo "selected='selected'"; } } ?> value="yes_not_ios"><?php esc_html_e( 'Yes (but not on Mac devices)', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Responsiveness', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[responsiveness]">
									<option <?php if(isset($options['responsiveness'])){ $responsiveness = $options['responsiveness']; if ($responsiveness == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									<option <?php if(isset($options['responsiveness'])){ $responsiveness = $options['responsiveness']; if ($responsiveness == 'no') { echo "selected='selected'"; } }  ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Show back button', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[show_back_button]">
									<option <?php if(isset($options['show_back_button'])){ $show_back_button = $options['show_back_button']; if ($show_back_button == 'no') { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['show_back_button'])){ $show_back_button = $options['show_back_button']; if ($show_back_button == 'yes') { echo "selected='selected'"; } }  ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Elements animation on mobile/touch devices', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[elements_animation_on_touch]">
									<option <?php if(isset($options['elements_animation_on_touch'])){ $elements_animation_on_touch = $options['elements_animation_on_touch']; if ($elements_animation_on_touch == 'no') { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['elements_animation_on_touch'])){ $elements_animation_on_touch = $options['elements_animation_on_touch']; if ($elements_animation_on_touch == 'yes') { echo "selected='selected'"; } }  ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Google Analytics Account ID', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[google_analytics_code]" type="text" value="<?php if (isset($options['google_analytics_code'])) { echo esc_attr($options['google_analytics_code']); } ?>" size="63" maxlength="500" />
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Google Maps API key', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[google_maps_api_key]" type="text" value="<?php if (isset($options['google_maps_api_key'])) { echo esc_attr($options['google_maps_api_key']); } ?>" size="63" maxlength="500" />
							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('List of internal URLs loaded without AJAX (separated with comma)', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<textarea id="internal_no_ajax_links" name="qode_options_theme13[internal_no_ajax_links]" cols="60" rows="5"><?php if (isset($options['internal_no_ajax_links'])) { echo esc_attr($options['internal_no_ajax_links']); } ?></textarea>
								</div>

							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('Custom css', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<textarea id="custom_css" name="qode_options_theme13[custom_css]" cols="60" rows="5"><?php if ($options['custom_css']) { echo esc_attr($options['custom_css']); } ?></textarea>
								</div>

							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('Custom js', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<textarea id="custom_js" name="qode_options_theme13[custom_js]" cols="60" rows="5"><?php if ($options['custom_js']) { echo esc_attr($options['custom_js']); } ?></textarea>
								</div><br/>
								<?php esc_html_e('jQuery selector is "$j" because of the conflict mode', 'strata-core'); ?>
							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('Meta Keywords', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<textarea id="meta_keywords" name="qode_options_theme13[meta_keywords]" cols="60" rows="5"><?php if ($options['meta_keywords']) { echo esc_attr($options['meta_keywords']); } ?></textarea>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('Meta Description', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<textarea id="meta_description" name="qode_options_theme13[meta_description]" cols="60" rows="5"><?php if ($options['meta_description']) { echo esc_attr($options['meta_description']); } ?></textarea>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Disable Qode SEO', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[disable_qode_seo]">
									<option <?php if(isset($options['disable_qode_seo'])){ $disable_qode_seo = $options['disable_qode_seo']; if ($disable_qode_seo == 'no') { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['disable_qode_seo'])){ $disable_qode_seo = $options['disable_qode_seo']; if ($disable_qode_seo == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e( 'General font options', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Headings', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H1 style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h1_color']){ echo 'background-color:'.esc_attr($options['h1_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[h1_color]" type="text" value="<?php if ($options['h1_color']) { echo esc_attr($options['h1_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[h1_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h1_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h1_fontsize]" type="text" value="<?php if ($options['h1_fontsize']) { echo esc_attr($options['h1_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h1_lineheight]" type="text" value="<?php if ($options['h1_lineheight']) { echo esc_attr($options['h1_lineheight']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[h1_fontstyle]">
										<option <?php if ($options['h1_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h1_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if ($options['h1_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[h1_fontweight]">
										<option <?php if ($options['h1_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h1_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
										<option <?php if ($options['h1_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
										<option <?php if ($options['h1_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
										<option <?php if ($options['h1_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
										<option <?php if ($options['h1_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
										<option <?php if ($options['h1_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
										<option <?php if ($options['h1_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
										<option <?php if ($options['h1_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h1_letterspacing]" type="text" value="<?php if (isset($options['h1_letterspacing']) && $options['h1_letterspacing']) { echo esc_attr($options['h1_letterspacing']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H2 style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h2_color']){ echo 'background-color:'.esc_attr($options['h2_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[h2_color]" type="text" value="<?php if ($options['h2_color']) { echo esc_attr($options['h2_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[h2_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h2_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h2_fontsize]" type="text" value="<?php if ($options['h2_fontsize']) { echo esc_attr($options['h2_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h2_lineheight]" type="text" value="<?php if ($options['h2_lineheight']) { echo esc_attr($options['h2_lineheight']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[h2_fontstyle]">
										<option <?php if ($options['h2_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h2_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if ($options['h2_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[h2_fontweight]">
										<option <?php if ($options['h2_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h2_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
										<option <?php if ($options['h2_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
										<option <?php if ($options['h2_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
										<option <?php if ($options['h2_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
										<option <?php if ($options['h2_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
										<option <?php if ($options['h2_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
										<option <?php if ($options['h2_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
										<option <?php if ($options['h2_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h2_letterspacing]" type="text" value="<?php if (isset($options['h2_letterspacing']) && $options['h2_letterspacing']) { echo esc_attr($options['h2_letterspacing']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H3 style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h3_color']){ echo 'background-color:'.esc_attr($options['h3_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[h3_color]" type="text" value="<?php if ($options['h3_color']) { echo esc_attr($options['h3_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[h3_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h3_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h3_fontsize]" type="text" value="<?php if ($options['h3_fontsize']) { echo esc_attr($options['h3_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h3_lineheight]" type="text" value="<?php if ($options['h3_lineheight']) { echo esc_attr($options['h3_lineheight']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[h3_fontstyle]">
										<option <?php if ($options['h3_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h3_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if ($options['h3_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[h3_fontweight]">
										<option <?php if ($options['h3_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h3_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
										<option <?php if ($options['h3_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
										<option <?php if ($options['h3_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
										<option <?php if ($options['h3_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
										<option <?php if ($options['h3_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
										<option <?php if ($options['h3_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
										<option <?php if ($options['h3_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
										<option <?php if ($options['h3_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h3_letterspacing]" type="text" value="<?php if (isset($options['h3_letterspacing']) && $options['h3_letterspacing']) { echo esc_attr($options['h3_letterspacing']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H4 style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h4_color']){ echo 'background-color:'.esc_attr($options['h4_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[h4_color]" type="text" value="<?php if ($options['h4_color']) { echo esc_attr($options['h4_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[h4_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h4_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h4_fontsize]" type="text" value="<?php if ($options['h4_fontsize']) { echo esc_attr($options['h4_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h4_lineheight]" type="text" value="<?php if ($options['h4_lineheight']) { echo esc_attr($options['h4_lineheight']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[h4_fontstyle]">
										<option <?php if ($options['h4_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h4_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if ($options['h4_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[h4_fontweight]">
										<option <?php if ($options['h4_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h4_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
										<option <?php if ($options['h4_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
										<option <?php if ($options['h4_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
										<option <?php if ($options['h4_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
										<option <?php if ($options['h4_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
										<option <?php if ($options['h4_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
										<option <?php if ($options['h4_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
										<option <?php if ($options['h4_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h4_letterspacing]" type="text" value="<?php if (isset($options['h4_letterspacing']) && $options['h4_letterspacing']) { echo esc_attr($options['h4_letterspacing']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H5 style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h5_color']){ echo 'background-color:'.esc_attr($options['h5_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[h5_color]" type="text" value="<?php if ($options['h5_color']) { echo esc_attr($options['h5_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[h5_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h5_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h5_fontsize]" type="text" value="<?php if ($options['h5_fontsize']) { echo esc_attr($options['h5_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h5_lineheight]" type="text" value="<?php if ($options['h5_lineheight']) { echo esc_attr($options['h5_lineheight']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[h5_fontstyle]">
										<option <?php if ($options['h5_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h5_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if ($options['h5_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[h5_fontweight]">
										<option <?php if ($options['h5_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h5_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
										<option <?php if ($options['h5_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
										<option <?php if ($options['h5_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
										<option <?php if ($options['h5_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
										<option <?php if ($options['h5_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
										<option <?php if ($options['h5_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
										<option <?php if ($options['h5_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
										<option <?php if ($options['h5_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h5_letterspacing]" type="text" value="<?php if (isset($options['h5_letterspacing']) && $options['h5_letterspacing']) { echo esc_attr($options['h5_letterspacing']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H6 style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h6_color']){ echo 'background-color:'.esc_attr($options['h6_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[h6_color]" type="text" value="<?php if ($options['h6_color']) { echo esc_attr($options['h6_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[h6_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h6_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h6_fontsize]" type="text" value="<?php if ($options['h6_fontsize']) { echo esc_attr($options['h6_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h6_lineheight]" type="text" value="<?php if ($options['h6_lineheight']) { echo esc_attr($options['h6_lineheight']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[h6_fontstyle]">
										<option <?php if ($options['h6_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h6_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if ($options['h6_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[h6_fontweight]">
										<option <?php if ($options['h6_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h6_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
										<option <?php if ($options['h6_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
										<option <?php if ($options['h6_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
										<option <?php if ($options['h6_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
										<option <?php if ($options['h6_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
										<option <?php if ($options['h6_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
										<option <?php if ($options['h6_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
										<option <?php if ($options['h6_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[h6_letterspacing]" type="text" value="<?php if (isset($options['h6_letterspacing']) && $options['h6_letterspacing']) { echo esc_attr($options['h6_letterspacing']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Text', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Text style', 'strata-core'); ?></td>
								<td>
									<div class="inline">
										<?php esc_html_e('Color', 'strata-core'); ?>
										<div class="colorSelector"><div style="<?php if ($options['text_color']){ echo 'background-color:'.esc_attr($options['text_color']).';'; } ?>"></div></div>
										<input name="qode_options_theme13[text_color]" type="text" value="<?php if ($options['text_color']) { echo esc_attr($options['text_color']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font family', 'strata-core'); ?>
										<select name="qode_options_theme13[text_google_fonts]">
											<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
											<?php foreach($fontArrays as $fontArray) { ?>
												<option <?php if ($options['text_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[text_fontsize]" type="text" value="<?php if ($options['text_fontsize']) { echo esc_attr($options['text_fontsize']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[text_lineheight]" type="text" value="<?php if ($options['text_lineheight']) { echo esc_attr($options['text_lineheight']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'strata-core'); ?>
										<select name="qode_options_theme13[text_fontstyle]">
											<option <?php if ($options['text_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['text_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
											<option <?php if ($options['text_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'strata-core'); ?>
										<select name="qode_options_theme13[text_fontweight]">
											<option <?php if ($options['text_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['text_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
											<option <?php if ($options['text_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
											<option <?php if ($options['text_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
											<option <?php if ($options['text_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
											<option <?php if ($options['text_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
											<option <?php if ($options['text_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
											<option <?php if ($options['text_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
											<option <?php if ($options['text_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>

										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Top/Bottom margin (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[text_margin]" type="text" value="<?php if (isset($options['text_margin'])) { echo esc_attr($options['text_margin']); } ?>" size="10" maxlength="10" />
									</div>
								</td>
						</tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Link style', 'strata-core'); ?></td>
								<td>
									<div class="inline">
										<?php esc_html_e('Color', 'strata-core'); ?>
										<div class="colorSelector"><div style="<?php if ($options['link_color']){ echo 'background-color:'.esc_attr($options['link_color']).';'; } ?>"></div></div>
										<input name="qode_options_theme13[link_color]" type="text" value="<?php if ($options['link_color']) { echo esc_attr($options['link_color']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Hover color', 'strata-core'); ?>
										<div class="colorSelector"><div style="<?php if ($options['link_hovercolor']){ echo 'background-color:'.esc_attr($options['link_hovercolor']).';'; } ?>"></div></div>
										<input name="qode_options_theme13[link_hovercolor]" type="text" value="<?php if ($options['link_hovercolor']) { echo esc_attr($options['link_hovercolor']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'strata-core'); ?>
										<select name="qode_options_theme13[link_fontstyle]">
											<option <?php if ($options['link_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['link_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
											<option <?php if ($options['link_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'strata-core'); ?>
										<select name="qode_options_theme13[link_fontweight]">
											<option <?php if ($options['link_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['link_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
											<option <?php if ($options['link_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
											<option <?php if ($options['link_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
											<option <?php if ($options['link_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
											<option <?php if ($options['link_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
											<option <?php if ($options['link_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
											<option <?php if ($options['link_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
											<option <?php if ($options['link_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>

										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font decoration', 'strata-core'); ?>
										<select name="qode_options_theme13[link_fontdecoration]">
											<option <?php if ($options['link_fontdecoration'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['link_fontdecoration'] == "none") { echo "selected='selected'"; } ?> value="none"><?php esc_html_e( 'none', 'strata-core' ); ?></option>
											<option <?php if ($options['link_fontdecoration'] == "bold") { echo "selected='selected'"; } ?> value="underline"><?php esc_html_e( 'underline', 'strata-core' ); ?></option>

										</select>
									</div>
								</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Page title', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Page title style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['page_title_color']){ echo 'background-color:'.esc_attr($options['page_title_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[page_title_color]" type="text" value="<?php if ($options['page_title_color']) { echo esc_attr($options['page_title_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[page_title_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['page_title_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[page_title_fontsize]" type="text" value="<?php if ($options['page_title_fontsize']) { echo esc_attr($options['page_title_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[page_title_lineheight]" type="text" value="<?php if ($options['page_title_lineheight']) { echo esc_attr($options['page_title_lineheight']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[page_title_fontstyle]">
										<option <?php if ($options['page_title_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['page_title_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if ($options['page_title_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[page_title_fontweight]">
										<option <?php if ($options['page_title_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['page_title_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
											<option <?php if ($options['page_title_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
											<option <?php if ($options['page_title_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
											<option <?php if ($options['page_title_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
											<option <?php if ($options['page_title_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
											<option <?php if ($options['page_title_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
											<option <?php if ($options['page_title_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
											<option <?php if ($options['page_title_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>

									</select>
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Info Data Style', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Info data style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['info_data_color']) && $options['info_data_color']){ echo 'background-color:'.esc_attr($options['info_data_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[info_data_color]" type="text" value="<?php if (isset($options['info_data_color']) && $options['info_data_color']) { echo esc_attr($options['info_data_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[info_data_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if (isset($options['info_data_google_fonts']) && $options['info_data_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[info_data_fontsize]" type="text" value="<?php if (isset($options['info_data_fontsize']) && $options['info_data_fontsize']) { echo esc_attr($options['info_data_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[info_data_fontstyle]">
										<option <?php if (isset($options['info_data_fontstyle']) && $options['info_data_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['info_data_fontstyle']) && $options['info_data_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if (isset($options['info_data_fontstyle']) && $options['info_data_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[info_data_fontweight]">
										<option <?php if (isset($options['info_data_fontweight']) && $options['info_data_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['info_data_fontweight']) && $options['info_data_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
										<option <?php if (isset($options['info_data_fontweight']) && $options['info_data_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
										<option <?php if (isset($options['info_data_fontweight']) && $options['info_data_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
										<option <?php if (isset($options['info_data_fontweight']) && $options['info_data_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
										<option <?php if (isset($options['info_data_fontweight']) && $options['info_data_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
										<option <?php if (isset($options['info_data_fontweight']) && $options['info_data_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
										<option <?php if (isset($options['info_data_fontweight']) && $options['info_data_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
										<option <?php if (isset($options['info_data_fontweight']) && $options['info_data_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Icon Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['info_data_icon_color']) && $options['info_data_icon_color']){ echo 'background-color:'.esc_attr($options['info_data_icon_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[info_data_icon_color]" type="text" value="<?php if (isset($options['info_data_icon_color']) && $options['info_data_icon_color']) { echo esc_attr($options['info_data_icon_color']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e( 'Header and Footer', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Header', 'strata-core' ); ?></h2></td></tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Header in grid', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[header_in_grid]">
										<option <?php if(isset($options['header_in_grid'])){ if ($options['header_in_grid'] == "no") { echo "selected='selected'"; }} ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['header_in_grid'])){ if ($options['header_in_grid'] == "yes") { echo "selected='selected'"; }} ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Show header top area', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[header_top_area]">
										<option <?php if(isset($options['header_top_area'])){ if ($options['header_top_area'] == "no") { echo "selected='selected'"; }} ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['header_top_area'])){ if ($options['header_top_area'] == "yes") { echo "selected='selected'"; }} ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Scroll header top area', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[header_top_area_scroll]">
										<option <?php if(isset($options['header_top_area_scroll'])){ if ($options['header_top_area_scroll'] == "no") { echo "selected='selected'"; }} ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['header_top_area_scroll'])){ if ($options['header_top_area_scroll'] == "yes") { echo "selected='selected'"; }} ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Enable breadcrumbs', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[enable_breadcrumbs]">
										<option <?php if(isset($options['enable_breadcrumbs'])){ if ($options['enable_breadcrumbs'] == "no") { echo "selected='selected'"; }} ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['enable_breadcrumbs'])){ if ($options['enable_breadcrumbs'] == "yes") { echo "selected='selected'"; }} ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Enable Qode search', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[enable_search]">
										<option <?php if(isset($options['enable_search'])){ if ($options['enable_search'] == "no") { echo "selected='selected'"; }} ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['enable_search'])){ if ($options['enable_search'] == "yes") { echo "selected='selected'"; }} ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Header bottom appearance', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[header_bottom_appearance]">
										<option <?php if(isset($options['header_bottom_appearance'])){ if ($options['header_bottom_appearance'] == "regular") { echo "selected='selected'"; }} ?> value="regular"><?php esc_html_e( 'Regular', 'strata-core' ); ?></option>
										<option <?php if(isset($options['header_bottom_appearance'])){ if ($options['header_bottom_appearance'] == "fixed") { echo "selected='selected'"; }} ?> value="fixed"><?php esc_html_e( 'Fixed', 'strata-core' ); ?></option>
										<option <?php if(isset($options['header_bottom_appearance'])){ if ($options['header_bottom_appearance'] == "stick") { echo "selected='selected'"; }} ?> value="stick"><?php esc_html_e( 'Sticky', 'strata-core' ); ?></option>
										<option <?php if(isset($options['header_bottom_appearance'])){ if ($options['header_bottom_appearance'] == "stick menu_bottom") { echo "selected='selected'"; }} ?> value="stick menu_bottom"><?php esc_html_e( 'Sticky with menu on bottom', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Header style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[header_style]">
										<option <?php if(isset($options['header_style'])){ if ($options['header_style'] == "") { echo "selected='selected'"; }} ?> value=""></option>
										<option <?php if(isset($options['header_style'])){ if ($options['header_style'] == "light") { echo "selected='selected'"; }} ?> value="light"><?php esc_html_e( 'Light', 'strata-core' ); ?></option>
										<option <?php if(isset($options['header_style'])){ if ($options['header_style'] == "dark") { echo "selected='selected'"; }} ?> value="dark"><?php esc_html_e( 'Dark', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Menu position', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[menu_position]">
										<option <?php if(isset($options['menu_position'])){ if ($options['menu_position'] == "") { echo "selected='selected'"; }} ?> value=""><?php esc_html_e( 'Deafult', 'strata-core' ); ?></option>
										<option <?php if(isset($options['menu_position'])){ if ($options['menu_position'] == "center") { echo "selected='selected'"; }} ?> value="center"><?php esc_html_e( 'Center', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Top background color', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Background Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['header_top_background_color']){ echo 'background-color:'.esc_attr($options['header_top_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[header_top_background_color]" type="text" value="<?php if (isset($options['header_top_background_color'])) { echo esc_attr($options['header_top_background_color']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Bottom background color', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Initial', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['header_background_color']){ echo 'background-color:'.esc_attr($options['header_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[header_background_color]" type="text" value="<?php if (isset($options['header_background_color'])) { echo esc_attr($options['header_background_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Scrolled (fixed style)', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['header_background_color_scroll'])) { if($options['header_background_color_scroll']){ echo 'background-color:'.esc_attr($options['header_background_color_scroll']).';'; } }?>"></div></div>
									<input name="qode_options_theme13[header_background_color_scroll]" type="text" value="<?php if (isset($options['header_background_color_scroll'])) { echo esc_attr($options['header_background_color_scroll']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Sticky', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['header_background_color_sticky'])) { if($options['header_background_color_sticky']){ echo 'background-color:'.esc_attr($options['header_background_color_sticky']).';'; } }?>"></div></div>
									<input name="qode_options_theme13[header_background_color_sticky]" type="text" value="<?php if (isset($options['header_background_color_sticky'])) { echo esc_attr($options['header_background_color_sticky']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Header separator color', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['header_separator_color']) && $options['header_separator_color']){ echo 'background-color:'.esc_attr($options['header_separator_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[header_separator_color]" type="text" value="<?php if (isset($options['header_separator_color'])) { echo esc_attr($options['header_separator_color']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Transparency', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Initial', 'strata-core'); ?>
									<input name="qode_options_theme13[header_background_transparency_initial]" type="text" value="<?php if (isset($options['header_background_transparency_initial'])) { echo esc_attr($options['header_background_transparency_initial']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Scrolled (fixed style)', 'strata-core'); ?>
									<input name="qode_options_theme13[header_background_transparency_scroll]" type="text" value="<?php if (isset($options['header_background_transparency_scroll'])) { echo esc_attr($options['header_background_transparency_scroll']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Sticky', 'strata-core'); ?>
									<input name="qode_options_theme13[header_background_transparency_sticky]" type="text" value="<?php if (isset($options['header_background_transparency_sticky'])) { echo esc_attr($options['header_background_transparency_sticky']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border Initial', 'strata-core'); ?>
									<input name="qode_options_theme13[header_border_transparency_initial]" type="text" value="<?php if (isset($options['header_border_transparency_initial'])) { echo esc_attr($options['header_border_transparency_initial']); } ?>" size="10" maxlength="10" />
								</div>
								<?php esc_html_e('(from 0 to 1)', 'strata-core'); ?>
							</td>
						</tr>
						<tr valign="top">
							<td valign="top" width="150"><?php esc_html_e('Logo', 'strata-core'); ?></td>
							<td>
								<div class="inline" style="width: 700px;">
									<?php esc_html_e('Logo image - normal', 'strata-core'); ?><br/>
									<input type="text" id="logo_image" name="qode_options_theme13[logo_image]" class="logo_image" value="<?php if (isset($options['logo_image'])) { echo esc_attr($options['logo_image']); } else { echo QODE_ROOT."/img/logo.png"; } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div><br/><br/>
								<div class="inline" style="width: 700px;">
									<?php esc_html_e('Logo image - light', 'strata-core'); ?><br/>
									<input type="text" id="logo_image_light" name="qode_options_theme13[logo_image_light]" class="logo_image_light" value="<?php if (isset($options['logo_image_light'])) { echo esc_attr($options['logo_image_light']); } else { echo QODE_ROOT."/img/logo.png"; } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div><br/><br/>
								<div class="inline" style="width: 700px;">
									<?php esc_html_e('Logo image - dark', 'strata-core'); ?><br/>
									<input type="text" id="logo_image_dark" name="qode_options_theme13[logo_image_dark]" class="logo_image_dark" value="<?php if (isset($options['logo_image_dark'])) { echo esc_attr($options['logo_image_dark']); } else { echo QODE_ROOT."/img/logo_black.png"; } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div><br/><br/>
								<div class="inline"style="width: 700px;">
									<?php esc_html_e('Logo image - sticky header', 'strata-core'); ?><br/>
									<input type="text" id="logo_image_sticky" name="qode_options_theme13[logo_image_sticky]" class="logo_image_sticky" value="<?php if (isset($options['logo_image_sticky'])) { echo esc_attr($options['logo_image_sticky']); } else { echo QODE_ROOT."/img/logo_black.png"; } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Center logo', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[center_logo_image]">
									<option <?php if(isset($options['center_logo_image'])){ $center_logo_image = $options['center_logo_image']; if ($center_logo_image == 'no') { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['center_logo_image'])){ $center_logo_image = $options['center_logo_image']; if ($center_logo_image == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="top">
								<td scope="row" width="150"><?php esc_html_e('Header height', 'strata-core'); ?></td>
								<td>
									<div class="inline">
										<?php esc_html_e('Initial (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[header_height]" type="text" value="<?php if (isset($options['header_height'])) { echo esc_attr($options['header_height']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Scrolled - fixed style (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[header_height_scroll]" type="text" value="<?php if (isset($options['header_height_scroll'])) { echo esc_attr($options['header_height_scroll']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Sticky (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[header_height_sticky]" type="text" value="<?php if (isset($options['header_height_sticky'])) { echo esc_attr($options['header_height_sticky']); } ?>" size="10" maxlength="10" />
									</div>
								</td>
						</tr>
						<tr valign="top">
								<td scope="row" width="150"><?php esc_html_e('Scroll amount for sticky appear (px)', 'strata-core'); ?></td>
								<td>
									<div class="inline">
										<input name="qode_options_theme13[scroll_amount_for_sticky]" type="text" value="<?php if (isset($options['scroll_amount_for_sticky'])) { echo esc_attr($options['scroll_amount_for_sticky']); } ?>" size="10" maxlength="10" />
									</div>
								</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Dropdown main menu', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Background color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_background_color'])){ echo 'background-color:'.esc_attr($options['dropdown_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[dropdown_background_color]" type="text" value="<?php if (isset($options['dropdown_background_color'])) { echo esc_attr($options['dropdown_background_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Transparency (From 0 to 1)', 'strata-core'); ?>
									<input name="qode_options_theme13[dropdown_background_transparency]" type="text" value="<?php if (isset($options['dropdown_background_transparency'])) { echo esc_attr($options['dropdown_background_transparency']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('1st level menu style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['menu_color']){ echo 'background-color:'.esc_attr($options['menu_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[menu_color]" type="text" value="<?php if ($options['menu_color']) { echo esc_attr($options['menu_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['menu_hovercolor'])){ echo 'background-color:'.esc_attr($options['menu_hovercolor']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[menu_hovercolor]" type="text" value="<?php if (isset($options['menu_hovercolor'])) { echo esc_attr($options['menu_hovercolor']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[menu_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['menu_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[menu_fontsize]" type="text" value="<?php if ($options['menu_fontsize']) { echo esc_attr($options['menu_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[menu_lineheight]" type="text" value="<?php if ($options['menu_lineheight']) { echo esc_attr($options['menu_lineheight']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[menu_fontstyle]">
										<option <?php if ($options['menu_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['menu_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if ($options['menu_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[menu_fontweight]">
										<option <?php if ($options['menu_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['menu_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
											<option <?php if ($options['menu_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
											<option <?php if ($options['menu_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
											<option <?php if ($options['menu_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
											<option <?php if ($options['menu_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
											<option <?php if ($options['menu_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
											<option <?php if ($options['menu_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
											<option <?php if ($options['menu_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>

									</select>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('2nd level menu style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_color'])){ echo 'background-color:'.esc_attr($options['dropdown_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[dropdown_color]" type="text" value="<?php if (isset($options['dropdown_color'])) { echo esc_attr($options['dropdown_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_hovercolor'])){ echo 'background-color:'.esc_attr($options['dropdown_hovercolor']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[dropdown_hovercolor]" type="text" value="<?php if (isset($options['dropdown_hovercolor'])) { echo esc_attr($options['dropdown_hovercolor']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[dropdown_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['dropdown_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[dropdown_fontsize]" type="text" value="<?php if ($options['dropdown_fontsize']) { echo esc_attr($options['dropdown_fontsize']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[dropdown_lineheight]" type="text" value="<?php if ($options['dropdown_lineheight']) { echo esc_attr($options['dropdown_lineheight']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'strata-core'); ?>
										<select name="qode_options_theme13[dropdown_fontstyle]">
											<option <?php if ($options['dropdown_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['dropdown_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
											<option <?php if ($options['dropdown_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'strata-core'); ?>
										<select name="qode_options_theme13[dropdown_fontweight]">
											<option <?php if ($options['dropdown_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['dropdown_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
											<option <?php if ($options['dropdown_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
											<option <?php if ($options['dropdown_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
											<option <?php if ($options['dropdown_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
											<option <?php if ($options['dropdown_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
											<option <?php if ($options['dropdown_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
											<option <?php if ($options['dropdown_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
											<option <?php if ($options['dropdown_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
										</select>
									</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('3rd level menu style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_color_thirdlvl'])){ echo 'background-color:'.esc_attr($options['dropdown_color_thirdlvl']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[dropdown_color_thirdlvl]" type="text" value="<?php if (isset($options['dropdown_color_thirdlvl'])) { echo esc_attr($options['dropdown_color_thirdlvl']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_hovercolor_thirdlvl'])){ echo 'background-color:'.esc_attr($options['dropdown_hovercolor_thirdlvl']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[dropdown_hovercolor_thirdlvl]" type="text" value="<?php if (isset($options['dropdown_hovercolor_thirdlvl'])) { echo esc_attr($options['dropdown_hovercolor_thirdlvl']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[dropdown_google_fonts_thirdlvl]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if(isset($options['dropdown_google_fonts_thirdlvl'])){ $dropdown_google_fonts_thirdlvl = $options['dropdown_google_fonts_thirdlvl']; if ($dropdown_google_fonts_thirdlvl == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[dropdown_fontsize_thirdlvl]" type="text" value="<?php if (isset($options['dropdown_fontsize_thirdlvl'])) { echo esc_attr($options['dropdown_fontsize_thirdlvl']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[dropdown_lineheight_thirdlvl]" type="text" value="<?php if (isset($options['dropdown_lineheight_thirdlvl'])) { echo esc_attr($options['dropdown_lineheight_thirdlvl']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'strata-core'); ?>
										<select name="qode_options_theme13[dropdown_fontstyle_thirdlvl]">
											<option <?php if(isset($options['dropdown_fontstyle_thirdlvl'])){ $dropdown_fontstyle_thirdlvl = $options['dropdown_fontstyle_thirdlvl']; if ($dropdown_fontstyle_thirdlvl == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['dropdown_fontstyle_thirdlvl'])){ $dropdown_fontstyle_thirdlvl = $options['dropdown_fontstyle_thirdlvl']; if ($dropdown_fontstyle_thirdlvl == 'normal') { echo "selected='selected'"; } } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
											<option <?php if(isset($options['dropdown_fontstyle_thirdlvl'])){ $dropdown_fontstyle_thirdlvl = $options['dropdown_fontstyle_thirdlvl']; if ($dropdown_fontstyle_thirdlvl == 'italic') { echo "selected='selected'"; } } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'strata-core'); ?>
										<select name="qode_options_theme13[dropdown_fontweight_thirdlvl]">
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '200') { echo "selected='selected'"; } } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '300') { echo "selected='selected'"; } } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '400') { echo "selected='selected'"; } } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '500') { echo "selected='selected'"; } } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '600') { echo "selected='selected'"; } } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '700') { echo "selected='selected'"; } } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '800') { echo "selected='selected'"; } } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '900') { echo "selected='selected'"; } } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
										</select>
									</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Fixed menu', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['fixed_color'])){ echo 'background-color:'.esc_attr($options['fixed_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[fixed_color]" type="text" value="<?php if (isset($options['fixed_color'])) { echo esc_attr($options['fixed_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['fixed_hovercolor'])){ echo 'background-color:'.esc_attr($options['fixed_hovercolor']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[fixed_hovercolor]" type="text" value="<?php if (isset($options['fixed_hovercolor'])) { echo esc_attr($options['fixed_hovercolor']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[fixed_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if(isset($options['fixed_google_fonts'])){ $fixed_google_fonts = $options['fixed_google_fonts']; if ($fixed_google_fonts == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[fixed_fontsize]" type="text" value="<?php if (isset($options['fixed_fontsize'])) { echo esc_attr($options['fixed_fontsize']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[fixed_lineheight]" type="text" value="<?php if (isset($options['fixed_lineheight'])) { echo esc_attr($options['fixed_lineheight']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'strata-core'); ?>
										<select name="qode_options_theme13[fixed_fontstyle]">
											<option <?php if(isset($options['fixed_fontstyle'])){ $fixed_fontstyle = $options['fixed_fontstyle']; if ($fixed_fontstyle == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['fixed_fontstyle'])){ $fixed_fontstyle = $options['fixed_fontstyle']; if ($fixed_fontstyle == 'normal') { echo "selected='selected'"; } } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
											<option <?php if(isset($options['fixed_fontstyle'])){ $fixed_fontstyle = $options['fixed_fontstyle']; if ($fixed_fontstyle == 'italic') { echo "selected='selected'"; } } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'strata-core'); ?>
										<select name="qode_options_theme13[fixed_fontweight]">
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '200') { echo "selected='selected'"; } } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '300') { echo "selected='selected'"; } } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '400') { echo "selected='selected'"; } } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '500') { echo "selected='selected'"; } } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '600') { echo "selected='selected'"; } } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '700') { echo "selected='selected'"; } } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '800') { echo "selected='selected'"; } } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '900') { echo "selected='selected'"; } } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
										</select>
									</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Sticky menu', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['sticky_color'])){ echo 'background-color:'.esc_attr($options['sticky_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[sticky_color]" type="text" value="<?php if (isset($options['sticky_color'])) { echo esc_attr($options['sticky_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['sticky_hovercolor'])){ echo 'background-color:'.esc_attr($options['sticky_hovercolor']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[sticky_hovercolor]" type="text" value="<?php if (isset($options['sticky_hovercolor'])) { echo esc_attr($options['sticky_hovercolor']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[sticky_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if(isset($options['sticky_google_fonts'])){ $sticky_google_fonts = $options['sticky_google_fonts']; if ($sticky_google_fonts == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[sticky_fontsize]" type="text" value="<?php if (isset($options['sticky_fontsize'])) { echo esc_attr($options['sticky_fontsize']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[sticky_lineheight]" type="text" value="<?php if (isset($options['sticky_lineheight'])) { echo esc_attr($options['sticky_lineheight']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'strata-core'); ?>
										<select name="qode_options_theme13[sticky_fontstyle]">
											<option <?php if(isset($options['sticky_fontstyle'])){ $sticky_fontstyle = $options['sticky_fontstyle']; if ($sticky_fontstyle == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['sticky_fontstyle'])){ $sticky_fontstyle = $options['sticky_fontstyle']; if ($sticky_fontstyle == 'normal') { echo "selected='selected'"; } } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
											<option <?php if(isset($options['sticky_fontstyle'])){ $sticky_fontstyle = $options['sticky_fontstyle']; if ($sticky_fontstyle == 'italic') { echo "selected='selected'"; } } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'strata-core'); ?>
										<select name="qode_options_theme13[sticky_fontweight]">
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '200') { echo "selected='selected'"; } } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '300') { echo "selected='selected'"; } } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '400') { echo "selected='selected'"; } } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '500') { echo "selected='selected'"; } } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '600') { echo "selected='selected'"; } } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '700') { echo "selected='selected'"; } } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '800') { echo "selected='selected'"; } } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '900') { echo "selected='selected'"; } } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
										</select>
									</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Mobile menu style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['mobile_color'])){ echo 'background-color:'.esc_attr($options['mobile_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[mobile_color]" type="text" value="<?php if (isset($options['mobile_color'])) { echo esc_attr($options['mobile_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['mobile_hovercolor'])){ echo 'background-color:'.esc_attr($options['mobile_hovercolor']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[mobile_hovercolor]" type="text" value="<?php if (isset($options['mobile_hovercolor'])) { echo esc_attr($options['mobile_hovercolor']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[mobile_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if(isset($options['mobile_google_fonts'])){ $mobile_google_fonts = $options['mobile_google_fonts']; if ($mobile_google_fonts == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[mobile_fontsize]" type="text" value="<?php if (isset($options['mobile_fontsize'])) { echo esc_attr($options['mobile_fontsize']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[mobile_lineheight]" type="text" value="<?php if (isset($options['mobile_lineheight'])) { echo esc_attr($options['mobile_lineheight']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'strata-core'); ?>
										<select name="qode_options_theme13[mobile_fontstyle]">
											<option <?php if(isset($options['mobile_fontstyle'])){ $mobile_fontstyle = $options['mobile_fontstyle']; if ($mobile_fontstyle == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['mobile_fontstyle'])){ $mobile_fontstyle = $options['mobile_fontstyle']; if ($mobile_fontstyle == 'normal') { echo "selected='selected'"; } } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
											<option <?php if(isset($options['mobile_fontstyle'])){ $mobile_fontstyle = $options['mobile_fontstyle']; if ($mobile_fontstyle == 'italic') { echo "selected='selected'"; } } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'strata-core'); ?>
										<select name="qode_options_theme13[mobile_fontweight]">
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '200') { echo "selected='selected'"; } } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '300') { echo "selected='selected'"; } } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '400') { echo "selected='selected'"; } } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '500') { echo "selected='selected'"; } } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '600') { echo "selected='selected'"; } } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '700') { echo "selected='selected'"; } } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '800') { echo "selected='selected'"; } } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '900') { echo "selected='selected'"; } } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>
										</select>
									</div><br /><br />
									<div class="inline">
										<?php esc_html_e('Separator color', 'strata-core'); ?>
										<div class="colorSelector"><div style="<?php if (isset($options['mobile_separator_color'])){ echo 'background-color:'.esc_attr($options['mobile_separator_color']).';'; } ?>"></div></div>
										<input name="qode_options_theme13[mobile_separator_color]" type="text" value="<?php if (isset($options['mobile_separator_color'])) { echo esc_attr($options['mobile_separator_color']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Background color', 'strata-core'); ?>
										<div class="colorSelector"><div style="<?php if (isset($options['mobile_background_color'])){ echo 'background-color:'.esc_attr($options['mobile_background_color']).';'; } ?>"></div></div>
										<input name="qode_options_theme13[mobile_background_color]" type="text" value="<?php if (isset($options['mobile_background_color'])) { echo esc_attr($options['mobile_background_color']); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Letter spacing (px)', 'strata-core'); ?>
										<input name="qode_options_theme13[mobile_letter_spacing]" type="text" value="<?php if (isset($options['mobile_letter_spacing'])) { echo esc_attr($options['mobile_letter_spacing']); } ?>" size="10" maxlength="10" />
									</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Title', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Animate title area', 'strata-core'); ?>
									<select name="qode_options_theme13[animate_title_area]">
										<option <?php if(isset($options['animate_title_area'])){ $animate_title_area = $options['animate_title_area']; if ($animate_title_area == 'no') { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No animation', 'strata-core' ); ?></option>
										<option <?php if(isset($options['animate_title_area'])){ $animate_title_area = $options['animate_title_area']; if ($animate_title_area == 'text_right_left') { echo "selected='selected'"; } } ?> value="text_right_left"><?php esc_html_e( 'Text right to left', 'strata-core' ); ?></option>
										<option <?php if(isset($options['animate_title_area'])){ $animate_title_area = $options['animate_title_area']; if ($animate_title_area == 'area_top_bottom') { echo "selected='selected'"; } } ?> value="area_top_bottom"><?php esc_html_e( 'Title area top to bottom', 'strata-core' ); ?></option>
									</select>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Text shadow', 'strata-core'); ?>
									<select name="qode_options_theme13[title_text_shadow]">
										<option <?php if(isset($options['title_text_shadow'])){ $title_text_shadow = $options['title_text_shadow']; if ($title_text_shadow == 'no') { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['title_text_shadow'])){ $title_text_shadow = $options['title_text_shadow']; if ($title_text_shadow == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Background color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['title_background_color'])){ echo 'background-color:'.esc_attr($options['title_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[title_background_color]" type="text" value="<?php if (isset($options['title_background_color'])) { echo esc_attr($options['title_background_color']); } ?>" size="10" maxlength="10" />
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Responsive title image', 'strata-core'); ?>
									<select name="qode_options_theme13[responsive_title_image]">
										<option <?php if(isset($options['responsive_title_image'])){ $responsive_title_image = $options['responsive_title_image']; if ($responsive_title_image == 'no') { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['responsive_title_image'])){ $responsive_title_image = $options['responsive_title_image']; if ($responsive_title_image == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Parallax title image', 'strata-core'); ?>
									<select name="qode_options_theme13[fixed_title_image]">
										<option <?php if(isset($options['fixed_title_image'])){ $fixed_title_image = $options['fixed_title_image']; if ($fixed_title_image == 'no') { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['fixed_title_image'])){ $fixed_title_image = $options['fixed_title_image']; if ($fixed_title_image == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
										<option <?php if(isset($options['fixed_title_image'])){ $fixed_title_image = $options['fixed_title_image']; if ($fixed_title_image == 'yes_zoom') { echo "selected='selected'"; } } ?> value="yes_zoom"><?php esc_html_e( 'Yes, with zoom out', 'strata-core' ); ?></option>
									</select>
									<?php esc_html_e('Only if title image is not responsive', 'strata-core'); ?>
								</div>
								<br/><br/>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Title image', 'strata-core'); ?>
									<input type="text" id="title_image" name="qode_options_theme13[title_image]" class="title_image" value="<?php if (isset($options['title_image'])) { echo esc_attr($options['title_image']); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
								<br/><br/>
								<div class="inline" style="width: 880px;">
									<?php esc_html_e('Title pattern overlay image', 'strata-core'); ?>
									<input type="text" id="title_overlay_image" name="qode_options_theme13[title_overlay_image]" class="title_overlay_image" value="<?php if (isset($options['title_overlay_image'])) { echo esc_attr($options['title_overlay_image']); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Title height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[title_height]" type="text" value="<?php if (isset($options['title_height'])) { echo esc_attr($options['title_height']); } ?>" size="10" maxlength="10" />
									<?php esc_html_e('Only if title image is not responsive', 'strata-core'); ?>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Title position', 'strata-core'); ?>
									<select name="qode_options_theme13[page_title_position]">
										<option <?php if ($options['page_title_position'] == "left") { echo "selected='selected'"; } ?> value="left"><?php esc_html_e( 'Left', 'strata-core' ); ?></option>
										<option <?php if ($options['page_title_position'] == "center") { echo "selected='selected'"; } ?> value="center"><?php esc_html_e( 'Center', 'strata-core' ); ?></option>
									</select>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Predefined title sizes', 'strata-core'); ?>
									<select name="qode_options_theme13[predefined_title_sizes]">
										<option <?php if (isset($options['predefined_title_sizes']) && $options['predefined_title_sizes'] == 'small') { echo "selected='selected'"; } ?> value="small"><?php esc_html_e( 'Small', 'strata-core' ); ?></option>
										<option <?php if (isset($options['predefined_title_sizes']) && $options['predefined_title_sizes'] == 'medium') { echo "selected='selected'"; } ?> value="medium"><?php esc_html_e( 'Medium', 'strata-core' ); ?></option>
										<option <?php if (isset($options['predefined_title_sizes']) && $options['predefined_title_sizes'] == 'large') { echo "selected='selected'"; } ?> value="large"><?php esc_html_e( 'Large', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Footer', 'strata-core' ); ?></h2></td></tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Uncovering footer', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[uncovering_footer]">
										<option <?php if(isset($options['uncovering_footer'])) { if ($options['uncovering_footer'] == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
										<option <?php if(isset($options['uncovering_footer'])) { if ($options['uncovering_footer'] == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Footer in grid', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[footer_in_grid]">
										<option <?php if(isset($options['footer_in_grid'])) { if ($options['footer_in_grid'] == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['footer_in_grid'])) { if ($options['footer_in_grid'] == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Show footer top', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[show_footer_top]">
										<option <?php if(isset($options['show_footer_top'])) { if ($options['show_footer_top'] == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
										<option <?php if(isset($options['show_footer_top'])) { if ($options['show_footer_top'] == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Footer top columns', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[footer_top_columns]">
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "1") { echo "selected='selected'"; } } ?> value="1">1</option>
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "2") { echo "selected='selected'"; } } ?> value="2">2</option>
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "3") { echo "selected='selected'"; } } ?> value="3">3</option>
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "5") { echo "selected='selected'"; } } ?> value="5"><?php esc_html_e( '3(25%+25%+50%)', 'strata-core' ); ?></option>
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "6") { echo "selected='selected'"; } } ?> value="6"><?php esc_html_e( '3(50%+25%+25%)', 'strata-core' ); ?></option>
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "4") { echo "selected='selected'"; } } ?> value="4">4</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Show footer bottom', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[footer_text]">
										<option <?php if ($options['footer_text'] == "no") { echo "selected='selected'"; } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if ($options['footer_text'] == "yes") { echo "selected='selected'"; } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>

									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Footer separator color', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['footer_separator_color']) && $options['footer_separator_color']){ echo 'background-color:'.esc_attr($options['footer_separator_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[footer_separator_color]" type="text" value="<?php if (isset($options['footer_separator_color']) && $options['footer_separator_color']) { echo esc_attr($options['footer_separator_color']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Footer top colors', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Title color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['footer_top_title_color']){ echo 'background-color:'.esc_attr($options['footer_top_title_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[footer_top_title_color]" type="text" value="<?php if ($options['footer_top_title_color']) { echo esc_attr($options['footer_top_title_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Text color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['footer_top_text_color']){ echo 'background-color:'.esc_attr($options['footer_top_text_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[footer_top_text_color]" type="text" value="<?php if ($options['footer_top_text_color']) { echo esc_attr($options['footer_top_text_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Link color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['footer_link_color'])){ echo 'background-color:'.esc_attr($options['footer_link_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[footer_link_color]" type="text" value="<?php if (isset($options['footer_link_color'])) { echo esc_attr($options['footer_link_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Link hover color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['footer_link_hover_color'])){ echo 'background-color:'.esc_attr($options['footer_link_hover_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[footer_link_hover_color]" type="text" value="<?php if (isset($options['footer_link_hover_color'])){ echo esc_attr($options['footer_link_hover_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Background color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['footer_top_background_color']){ echo 'background-color:'.esc_attr($options['footer_top_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[footer_top_background_color]" type="text" value="<?php if ($options['footer_top_background_color']) { echo esc_attr($options['footer_top_background_color']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Footer bottom colors', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Text color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['footer_bottom_text_color']){ echo 'background-color:'.esc_attr($options['footer_bottom_text_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[footer_bottom_text_color]" type="text" value="<?php if ($options['footer_bottom_text_color']) { echo esc_attr($options['footer_bottom_text_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Background color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['footer_bottom_background_color']){ echo 'background-color:'.esc_attr($options['footer_bottom_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[footer_bottom_background_color]" type="text" value="<?php if (isset($options['footer_bottom_background_color'])) { echo esc_attr($options['footer_bottom_background_color']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e( 'Elements', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Separator', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td valign="middle"></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['separator_color'])){ echo 'background-color:'.esc_attr($options['separator_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[separator_color]" type="text" value="<?php if (isset($options['separator_color'])) { echo esc_attr($options['separator_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Thickness (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[separator_thickness]" type="text" value="<?php if ($options['separator_thickness']) { echo esc_attr($options['separator_thickness']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Top margin (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[separator_topmargin]" type="text" value="<?php if ($options['separator_topmargin']) { echo esc_attr($options['separator_topmargin']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Bottom margin (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[separator_bottommargin]" type="text" value="<?php if ($options['separator_bottommargin']) { echo esc_attr($options['separator_bottommargin']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Buttons', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Button style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['button_title_color']){ echo 'background-color:'.esc_attr($options['button_title_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[button_title_color]" type="text" value="<?php if ($options['button_title_color']) { echo esc_attr($options['button_title_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['button_title_hovercolor']){ echo 'background-color:'.esc_attr($options['button_title_hovercolor']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[button_title_hovercolor]" type="text" value="<?php if ($options['button_title_hovercolor']) { echo esc_attr($options['button_title_hovercolor']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[button_title_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['button_title_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[button_title_fontsize]" type="text" value="<?php if ($options['button_title_fontsize']) { echo esc_attr($options['button_title_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[button_title_lineheight]" type="text" value="<?php if ($options['button_title_lineheight']) { echo esc_attr($options['button_title_lineheight']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[button_title_fontstyle]">
										<option <?php if ($options['button_title_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['button_title_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if ($options['button_title_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[button_title_fontweight]">
										<option <?php if ($options['button_title_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['button_title_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
										<option <?php if ($options['button_title_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
										<option <?php if ($options['button_title_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
										<option <?php if ($options['button_title_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
										<option <?php if ($options['button_title_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
										<option <?php if ($options['button_title_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
										<option <?php if ($options['button_title_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
										<option <?php if ($options['button_title_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>

									</select>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Hover background color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['button_backgroundcolor_hover']) && $options['button_backgroundcolor_hover']){ echo 'background-color:'.esc_attr($options['button_backgroundcolor_hover']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[button_backgroundcolor_hover]" type="text" value="<?php if (isset($options['button_backgroundcolor_hover']) && $options['button_backgroundcolor_hover']) { echo esc_attr($options['button_backgroundcolor_hover']); } ?>" size="10" maxlength="10" />
								</div>
                                <div class="inline">
                                    <?php esc_html_e('Top gradient color', 'strata-core'); ?>
                                    <div class="colorSelector"><div style="<?php if ($options['button_top_gradient_color']){ echo 'background-color:'.esc_attr($options['button_top_gradient_color']).';'; } ?>"></div></div>
                                    <input name="qode_options_theme13[button_top_gradient_color]" type="text" value="<?php if ($options['button_top_gradient_color']) { echo esc_attr($options['button_top_gradient_color']); } ?>" size="10" maxlength="10" />
                                </div>
                                <div class="inline">
                                    <?php esc_html_e('Bottom gradient color', 'strata-core'); ?>
                                    <div class="colorSelector"><div style="<?php if ($options['button_bottom_gradient_color']){ echo 'background-color:'.esc_attr($options['button_bottom_gradient_color']).';'; } ?>"></div></div>
                                    <input name="qode_options_theme13[button_bottom_gradient_color]" type="text" value="<?php if ($options['button_bottom_gradient_color']) { echo esc_attr($options['button_bottom_gradient_color']); } ?>" size="10" maxlength="10" />
                                </div>
                                <div class="inline">
                                    <?php esc_html_e('Border color', 'strata-core'); ?>
                                    <div class="colorSelector"><div style="<?php if ($options['button_border_color']){ echo 'background-color:'.esc_attr($options['button_border_color']).';'; } ?>"></div></div>
                                    <input name="qode_options_theme13[button_border_color]" type="text" value="<?php if ($options['button_border_color']) { echo esc_attr($options['button_border_color']); } ?>" size="10" maxlength="10" />
                                </div>
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Message box', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Message box style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['message_title_color']){ echo 'background-color:'.esc_attr($options['message_title_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[message_title_color]" type="text" value="<?php if ($options['message_title_color']) { echo esc_attr($options['message_title_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'strata-core'); ?>
									<select name="qode_options_theme13[message_title_google_fonts]">
										<option value="-1"><?php esc_html_e( 'Default', 'strata-core' ); ?></option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['message_title_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  esc_attr($fontArray["family"]); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[message_title_fontsize]" type="text" value="<?php if ($options['message_title_fontsize']) { echo esc_attr($options['message_title_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[message_title_lineheight]" type="text" value="<?php if ($options['message_title_lineheight']) { echo esc_attr($options['message_title_lineheight']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'strata-core'); ?>
									<select name="qode_options_theme13[message_title_fontstyle]">
										<option <?php if ($options['message_title_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['message_title_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal"><?php esc_html_e( 'normal', 'strata-core' ); ?></option>
										<option <?php if ($options['message_title_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic"><?php esc_html_e( 'italic', 'strata-core' ); ?></option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'strata-core'); ?>
									<select name="qode_options_theme13[message_title_fontweight]">
										<option <?php if ($options['message_title_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['message_title_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200"><?php esc_html_e( '200', 'strata-core' ); ?></option>
										<option <?php if ($options['message_title_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300"><?php esc_html_e( '300', 'strata-core' ); ?></option>
										<option <?php if ($options['message_title_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400"><?php esc_html_e( '400', 'strata-core' ); ?></option>
										<option <?php if ($options['message_title_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500"><?php esc_html_e( '500', 'strata-core' ); ?></option>
										<option <?php if ($options['message_title_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600"><?php esc_html_e( '600', 'strata-core' ); ?></option>
										<option <?php if ($options['message_title_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700"><?php esc_html_e( '700', 'strata-core' ); ?></option>
										<option <?php if ($options['message_title_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800"><?php esc_html_e( '800', 'strata-core' ); ?></option>
										<option <?php if ($options['message_title_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900"><?php esc_html_e( '900', 'strata-core' ); ?></option>

									</select>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Background color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['message_backgroundcolor']){ echo 'background-color:'.esc_attr($options['message_backgroundcolor']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[message_backgroundcolor]" type="text" value="<?php if ($options['message_backgroundcolor']) { echo esc_attr($options['message_backgroundcolor']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['message_bordercolor']) && $options['message_bordercolor']){ echo 'background-color:'.esc_attr($options['message_bordercolor']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[message_bordercolor]" type="text" value="<?php if (isset($options['message_bordercolor']) && $options['message_bordercolor']) { echo esc_attr($options['message_bordercolor']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Message icon style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['message_icon_color']) && $options['message_icon_color']){ echo 'background-color:'.esc_attr($options['message_icon_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[message_icon_color]" type="text" value="<?php if (isset($options['message_icon_color']) && $options['message_icon_color']) { echo esc_attr($options['message_icon_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'strata-core'); ?>
									<input name="qode_options_theme13[message_icon_fontsize]" type="text" value="<?php if (isset($options['message_icon_fontsize']) && $options['message_icon_fontsize']) { echo esc_attr($options['message_icon_fontsize']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Blockquote', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Blockquote style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['blockquote_font_color']){ echo 'background-color:'.esc_attr($options['blockquote_font_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[blockquote_font_color]" type="text" value="<?php if ($options['blockquote_font_color']) { echo esc_attr($options['blockquote_font_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Background Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['blockquote_background_color']) && $options['blockquote_background_color']){ echo 'background-color:'.esc_attr($options['blockquote_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[blockquote_background_color]" type="text" value="<?php if (isset($options['blockquote_background_color']) &&  $options['blockquote_background_color']) { echo esc_attr($options['blockquote_background_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['blockquote_border_color']) && $options['blockquote_border_color']){ echo 'background-color:'.esc_attr($options['blockquote_border_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[blockquote_border_color]" type="text" value="<?php if (isset($options['blockquote_border_color']) &&  $options['blockquote_border_color']) { echo esc_attr($options['blockquote_border_color']); } ?>" size="10" maxlength="10" />
								</div>
                                <div class="inline">
									<?php esc_html_e('Quote Icon Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['blockquote_quote_icon_color']) && $options['blockquote_quote_icon_color']){ echo 'background-color:'.esc_attr($options['blockquote_quote_icon_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[blockquote_quote_icon_color]" type="text" value="<?php if (isset($options['blockquote_quote_icon_color']) &&  $options['blockquote_quote_icon_color']) { echo esc_attr($options['blockquote_quote_icon_color']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Pricing Table', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Pricing table style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Gradient Top Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['pricing_table_top_color'])){ echo 'background-color:'.esc_attr($options['pricing_table_top_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[pricing_table_top_color]" type="text" value="<?php if (isset($options['pricing_table_top_color'])) { echo esc_attr($options['pricing_table_top_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Gradient Bottom Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['pricing_table_bottom_color'])){ echo 'background-color:'.esc_attr($options['pricing_table_bottom_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[pricing_table_bottom_color]" type="text" value="<?php if (isset($options['pricing_table_bottom_color'])) { echo esc_attr($options['pricing_table_bottom_color']); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['pricing_table_border_color'])){ echo 'background-color:'.esc_attr($options['pricing_table_border_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[pricing_table_border_color]" type="text" value="<?php if (isset($options['pricing_table_border_color'])) { echo esc_attr($options['pricing_table_border_color']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Social Icon', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background Color', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Icon Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['social_icon_color']){ echo 'background-color:'.esc_attr($options['social_icon_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[social_icon_color]" type="text" value="<?php if (isset($options['social_icon_color']) && $options['social_icon_color']) { echo esc_attr($options['social_icon_color']); } ?>" size="10" maxlength="12" />
								</div>
                                <div class="inline">
									<?php esc_html_e('Top Gradient Background Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['social_icon_top_gradient_background_color']){ echo 'background-color:'.esc_attr($options['social_icon_top_gradient_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[social_icon_top_gradient_background_color]" type="text" value="<?php if (isset($options['social_icon_top_gradient_background_color']) && $options['social_icon_top_gradient_background_color']) { echo esc_attr($options['social_icon_top_gradient_background_color']); } ?>" size="10" maxlength="12" />
								</div>
                                <div class="inline">
									<?php esc_html_e('Bottom Gradient Background Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['social_icon_bottom_gradient_background_color']){ echo 'background-color:'.esc_attr($options['social_icon_bottom_gradient_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[social_icon_bottom_gradient_background_color]" type="text" value="<?php if (isset($options['social_icon_bottom_gradient_background_color']) && $options['social_icon_bottom_gradient_background_color']) { echo esc_attr($options['social_icon_bottom_gradient_background_color']); } ?>" size="10" maxlength="12" />
								</div>
                                <div class="inline">
									<?php esc_html_e('Icon Border Color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['social_icon_border_color']){ echo 'background-color:'.esc_attr($options['social_icon_border_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[social_icon_border_color]" type="text" value="<?php if (isset($options['social_icon_border_color']) && $options['social_icon_border_color']) { echo esc_attr($options['social_icon_border_color']); } ?>" size="10" maxlength="12" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Smooth Scroll', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Smooth scroll style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Background color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['smooth_background_color']){ echo 'background-color:'.esc_attr($options['smooth_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[smooth_background_color]" type="text" value="<?php if(isset($options['smooth_background_color'])){ if ($options['smooth_background_color']) { echo esc_attr($options['smooth_background_color']); } } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Bar color', 'strata-core'); ?>
									<div class="colorSelector"><div style="<?php if ($options['smooth_bar_color']){ echo 'background-color:'.esc_attr($options['smooth_bar_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[smooth_bar_color]" type="text" value="<?php if(isset($options['smooth_bar_color'])){ if ($options['smooth_bar_color']) { echo esc_attr($options['smooth_bar_color']); } } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e( 'Side Area', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Enable Side Area', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[enable_side_area]">
										<option <?php if ((isset($options['enable_side_area'])) && $options['enable_side_area'] == "yes") { echo "selected='selected'"; } ?> value="yes"><?php esc_html_e( 'yes', 'strata-core' ); ?></option>
										<option <?php if ((isset($options['enable_side_area'])) && $options['enable_side_area'] == "no") { echo "selected='selected'"; } ?> value="no"><?php esc_html_e( 'no', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Side Area Title', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<input name="qode_options_theme13[side_area_title]" type="text" value="<?php if(isset($options['side_area_title'])) { if ($options['side_area_title']) { echo esc_attr($options['side_area_title']); } } ?>" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background Color', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['side_area_background_color']) && $options['side_area_background_color']){ echo 'background-color:'.esc_attr($options['side_area_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[side_area_background_color]" type="text" value="<?php if(isset($options['side_area_background_color'])){ if ($options['side_area_background_color']) { echo esc_attr($options['side_area_background_color']); } } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Text Color', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['side_area_text_color']) && $options['side_area_text_color']){ echo 'background-color:'.esc_attr($options['side_area_text_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[side_area_text_color]" type="text" value="<?php if(isset($options['side_area_text_color'])){ if ($options['side_area_text_color']) { echo esc_attr($options['side_area_text_color']); } } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Title Color', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['side_area_title_color']) && $options['side_area_title_color']){ echo 'color:'.esc_attr($options['side_area_title_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[side_area_title_color]" type="text" value="<?php if(isset($options['side_area_title_color'])){ if ($options['side_area_title_color']) { echo esc_attr($options['side_area_title_color']); } } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e( 'Content Bottom Area', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Enable Content Bottom Area', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[enable_content_bottom_area]">
										<option <?php if ((isset($options['enable_content_bottom_area'])) && $options['enable_content_bottom_area'] == "yes") { echo "selected='selected'"; } ?> value="yes"><?php esc_html_e( 'yes', 'strata-core' ); ?></option>
										<option <?php if ((isset($options['enable_content_bottom_area'])) && $options['enable_content_bottom_area'] == "no") { echo "selected='selected'"; } ?> value="no"><?php esc_html_e( 'no', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Content bottom sidebar to display', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[content_bottom_sidebar_custom_display]">
									<option value="" <?php if(isset($options['content_bottom_sidebar_custom_display'])){ $content_bottom_sidebar_custom_display = $options['content_bottom_sidebar_custom_display'];  if ($content_bottom_sidebar_custom_display == "" ) { echo "selected='selected'";  } }?>></option>
									<?php
									foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
										if(strata_qode_is_user_made_sidebar(ucwords($sidebar['name']))){
									?>
										<option value="<?php echo ucwords( $sidebar['id'] ); ?>" <?php if(isset($options['content_bottom_sidebar_custom_display'])){ $content_bottom_sidebar_custom_display = $options['content_bottom_sidebar_custom_display'];  if ($content_bottom_sidebar_custom_display == ucwords( $sidebar['id'] ) ) { echo "selected='selected'";  } }?>>
											<?php echo ucwords( $sidebar['name'] ); ?>
										</option>
										<?php
											}
										}
										?>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td valign="middle" width="150"><?php esc_html_e('Content bottom in grid', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[content_bottom_in_grid]">
										<option <?php if(isset($options['content_bottom_in_grid'])){ if ($options['content_bottom_in_grid'] == "no") { echo "selected='selected'"; }} ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['content_bottom_in_grid'])){ if ($options['content_bottom_in_grid'] == "yes") { echo "selected='selected'"; }} ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background Color', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['content_bottom_background_color']) && $options['content_bottom_background_color']){ echo 'background-color:'.esc_attr($options['content_bottom_background_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[content_bottom_background_color]" type="text" value="<?php if(isset($options['content_bottom_background_color'])){ if ($options['content_bottom_background_color']) { echo esc_attr($options['content_bottom_background_color']); } } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e( 'Parallax', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Parallax speed', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<input name="qode_options_theme13[parallax_speed]" type="text" value="<?php if ($options['parallax_speed']) { echo esc_attr($options['parallax_speed']); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Parallax on touch devices', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[parallax_onoff]">
									<option <?php if ($options['parallax_onoff'] == "on") { echo "selected='selected'"; } ?> value="on"><?php esc_html_e( 'on', 'strata-core' ); ?></option>
									<option <?php if ($options['parallax_onoff'] == "off") { echo "selected='selected'"; } ?> value="off"><?php esc_html_e( 'off', 'strata-core' ); ?></option>
								</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Parallax min height (px)', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<input name="qode_options_theme13[parallax_minheight]" type="text" value="<?php if ($options['parallax_minheight']) { echo esc_attr($options['parallax_minheight']); } ?>" size="10" maxlength="10" />
									<?php esc_html_e('Set min-height for last two stages', 'strata-core'); ?>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h3><?php esc_html_e( 'Portfolio', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Portfolio single', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Portfolio style', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[portfolio_style]">
									<option <?php if ($options['portfolio_style'] == 1) { echo "selected='selected'"; } ?> value="1"><?php esc_html_e( 'Portfolio small images', 'strata-core' ); ?></option>
									<option <?php if ($options['portfolio_style'] == 2) { echo "selected='selected'"; } ?> value="2"><?php esc_html_e( 'Portfolio small slider', 'strata-core' ); ?></option>
									<option <?php if ($options['portfolio_style'] == 5) { echo "selected='selected'"; } ?> value="5"><?php esc_html_e( 'Portfolio big images', 'strata-core' ); ?></option>
									<option <?php if ($options['portfolio_style'] == 3) { echo "selected='selected'"; } ?> value="3"><?php esc_html_e( 'Portfolio big slider', 'strata-core' ); ?></option>
									<option <?php if ($options['portfolio_style'] == 4) { echo "selected='selected'"; } ?> value="4"><?php esc_html_e( 'Portfolio custom', 'strata-core' ); ?></option>
									<option <?php if ($options['portfolio_style'] == 7) { echo "selected='selected'"; } ?> value="7"><?php esc_html_e( 'Portfolio full width custom', 'strata-core' ); ?></option>
									<option <?php if ($options['portfolio_style'] == 6) { echo "selected='selected'"; } ?> value="6"><?php esc_html_e( 'Portfolio gallery', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Portfolio Qode Like', 'strata-core'); ?></td>
								<td>
									<select name="qode_options_theme13[portfolio_qode_like]">
										<option <?php if (isset($options['portfolio_qode_like'])){ $portfolio_qode_like = $options['portfolio_qode_like']; if ($portfolio_qode_like == 'on') { echo "selected='selected'"; } } ?> value="on"><?php esc_html_e( 'On', 'strata-core' ); ?></option>
										<option <?php if (isset($options['portfolio_qode_like'])){ $portfolio_qode_like = $options['portfolio_qode_like']; if ($portfolio_qode_like == 'off') { echo "selected='selected'"; } } ?> value="off"><?php esc_html_e( 'Off', 'strata-core' ); ?></option>
									</select>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Lightbox for single project', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[lightbox_single_project]">
										<option <?php if(isset($options['lightbox_single_project'])){ $lightbox_single_project = $options['lightbox_single_project']; if ($lightbox_single_project == 'no') { echo "selected='selected'"; } }  ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['lightbox_single_project'])){ $lightbox_single_project = $options['lightbox_single_project']; if ($lightbox_single_project == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Number of columns for Portfolio gallery style', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_theme13[portfolio_columns_number]">
										<option <?php if(isset($options['portfolio_columns_number'])){ $portfolio_columns_number = $options['portfolio_columns_number']; if ($options['portfolio_columns_number'] == 2) { echo "selected='selected'"; } } ?> value="2"><?php esc_html_e( '2 columns', 'strata-core' ); ?></option>
										<option <?php if(isset($options['portfolio_columns_number'])){ $portfolio_columns_number = $options['portfolio_columns_number']; if ($options['portfolio_columns_number'] == 3) { echo "selected='selected'"; } } ?> value="3"><?php esc_html_e( '3 columns', 'strata-core' ); ?></option>
										<option <?php if(isset($options['portfolio_columns_number'])){ $portfolio_columns_number = $options['portfolio_columns_number']; if ($options['portfolio_columns_number'] == 4) { echo "selected='selected'"; } } ?> value="4"><?php esc_html_e( '4 columns', 'strata-core' ); ?></option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Portfolio single slug', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<input name="qode_options_theme13[portfolio_single_slug]" type="text" value="<?php if (isset($options['portfolio_single_slug']) && $options['portfolio_single_slug'] != "") { echo esc_attr($options['portfolio_single_slug']); } ?>" />
									<?php echo sprintf(esc_html__('When you put the slug for portfolio page, you should navigate to ','strata-core').'<code>%s</code>'.esc_html__(' and click save button.','strata-core'), '<a href="'. admin_url('options-permalink.php') .'">'. esc_html__('Settings -> Permalinks','strata-core') .'</a>'); ?>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e( 'Blog', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Quote/Link box color', 'strata-core'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['blog_quote_link_box_color']){ echo 'background-color:'.esc_attr($options['blog_quote_link_box_color']).';'; } ?>"></div></div>
								<input name="qode_options_theme13[blog_quote_link_box_color]" type="text" value="<?php if (isset($options['blog_quote_link_box_color']) && $options['blog_quote_link_box_color']) { echo esc_attr($options['blog_quote_link_box_color']); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Blog list', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Pagination', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[pagination]">
									<option <?php if ($options['pagination'] == 0) { echo "selected='selected'"; } ?> value="0"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if ($options['pagination'] == 1) { echo "selected='selected'"; } ?> value="1"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Choose blog layout', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[blog_style]">
									<option <?php if ($options['blog_style'] == 1) { echo "selected='selected'"; } ?> value="1"><?php esc_html_e('Blog Large Image', 'strata-core'); ?></option>
									<option <?php if ($options['blog_style'] == 2) { echo "selected='selected'"; } ?> value="2"><?php esc_html_e('Blog Masonry', 'strata-core'); ?></option>
									<option <?php if ($options['blog_style'] == 3) { echo "selected='selected'"; } ?> value="3"><?php esc_html_e('Blog Large Image Whole Post', 'strata-core'); ?></option>
									<option <?php if ($options['blog_style'] == 4) { echo "selected='selected'"; } ?> value="4"><?php esc_html_e('Blog Small Image', 'strata-core'); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Blog sidebar', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[category_blog_sidebar]">
									<option <?php if ($options['category_blog_sidebar'] == "default") { echo "selected='selected'"; } ?> value="default"><?php esc_html_e( 'No Sidebar', 'strata-core' ); ?></option>
									<option <?php if ($options['category_blog_sidebar'] == 1) { echo "selected='selected'"; } ?> value="1"><?php esc_html_e( 'Sidebar 1/3 right', 'strata-core' ); ?></option>
									<option <?php if ($options['category_blog_sidebar'] == 2) { echo "selected='selected'"; } ?> value="2"><?php esc_html_e( 'Sidebar 1/4 right', 'strata-core' ); ?></option>
									<option <?php if ($options['category_blog_sidebar'] == 3) { echo "selected='selected'"; } ?> value="3"><?php esc_html_e( 'Sidebar 1/3 left', 'strata-core' ); ?></option>
									<option <?php if ($options['category_blog_sidebar'] == 4) { echo "selected='selected'"; } ?> value="4"><?php esc_html_e( 'Sidebar 1/4 left', 'strata-core' ); ?></option>

								</select>
								<?php esc_html_e('For category list', 'strata-core'); ?>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Hide comments', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[blog_hide_comments]">
									<option <?php if(isset($options['blog_hide_comments'])){ $blog_hide_comments = $options['blog_hide_comments']; if ($blog_hide_comments == 'no') { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['blog_hide_comments'])){ $blog_hide_comments = $options['blog_hide_comments']; if ($blog_hide_comments == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Blog Qode Like', 'strata-core'); ?></td>
								<td>
									<select name="qode_options_theme13[qode_like]">
										<option <?php if (isset($options['qode_like'])){ $qode_like = $options['qode_like']; if ($qode_like == 'on') { echo "selected='selected'"; } } ?> value="on"><?php esc_html_e( 'On', 'strata-core' ); ?></option>
										<option <?php if (isset($options['qode_like'])){ $qode_like = $options['qode_like']; if ($qode_like == 'off') { echo "selected='selected'"; } } ?> value="off"><?php esc_html_e( 'Off', 'strata-core' ); ?></option>
									</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Page Range For Pagination', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[blog_page_range]" type="text" value="<?php if (isset($options['blog_page_range']) && $options['blog_page_range']) { echo esc_attr($options['blog_page_range']); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Number of words', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[number_of_chars]" type="text" value="<?php if (isset($options['number_of_chars']) && $options['number_of_chars']) { echo esc_attr($options['number_of_chars']); } ?>" size="10" maxlength="10" />
								<?php esc_html_e('Number of words in blog listing', 'strata-core'); ?>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Number of words in masonry blog template', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[number_of_chars_masonry]" type="text" value="<?php if (isset($options['number_of_chars_masonry']) && $options['number_of_chars_masonry']) { echo esc_attr($options['number_of_chars_masonry']); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Number of words in large image blog template', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[number_of_chars_large_image]" type="text" value="<?php if (isset($options['number_of_chars_large_image']) && $options['number_of_chars_large_image']) { echo esc_attr($options['number_of_chars_large_image']); } ?>" size="10" maxlength="10" />
							</td>
						</tr><tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Number of words in small image blog template', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[number_of_chars_small_image]" type="text" value="<?php if (isset($options['number_of_chars_small_image'])) { echo esc_attr($options['number_of_chars_small_image']); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr><td colspan='2'><h2><?php esc_html_e( 'Blog single', 'strata-core' ); ?></h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Sidebar layout', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[blog_single_sidebar]">
									<option <?php if(isset($options['blog_single_sidebar'])){$blog_single_sidebar = $options['blog_single_sidebar']; if ($blog_single_sidebar == "default") { echo "selected='selected'"; } } ?> value="default"><?php esc_html_e( 'No Sidebar', 'strata-core' ); ?></option>
									<option <?php if(isset($options['blog_single_sidebar'])){$blog_single_sidebar = $options['blog_single_sidebar']; if ($blog_single_sidebar == 1) { echo "selected='selected'"; } } ?> value="1"><?php esc_html_e( 'Sidebar 1/3 right', 'strata-core' ); ?></option>
									<option <?php if(isset($options['blog_single_sidebar'])){$blog_single_sidebar = $options['blog_single_sidebar']; if ($blog_single_sidebar == 2) { echo "selected='selected'"; } } ?> value="2"><?php esc_html_e( 'Sidebar 1/4 right', 'strata-core' ); ?></option>
									<option <?php if(isset($options['blog_single_sidebar'])){$blog_single_sidebar = $options['blog_single_sidebar']; if ($blog_single_sidebar == 3) { echo "selected='selected'"; } } ?> value="3"><?php esc_html_e( 'Sidebar 1/3 left', 'strata-core' ); ?></option>
									<option <?php if(isset($options['blog_single_sidebar'])){$blog_single_sidebar = $options['blog_single_sidebar']; if ($blog_single_sidebar == 4) { echo "selected='selected'"; } } ?> value="4"><?php esc_html_e( 'Sidebar 1/4 left', 'strata-core' ); ?></option>

								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Sidebar to display', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[blog_single_sidebar_custom_display]">
									<option value="" <?php if(isset($options['blog_single_sidebar_custom_display'])){ $blog_single_sidebar_custom_display = $options['blog_single_sidebar_custom_display'];  if ($blog_single_sidebar_custom_display == "" ) { echo "selected='selected'";  } }?>></option>
									<?php
									foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
										if(strata_qode_is_user_made_sidebar(ucwords($sidebar['name']))){
									?>
										<option value="<?php echo ucwords( $sidebar['id'] ); ?>" <?php if(isset($options['blog_single_sidebar_custom_display'])){ $blog_single_sidebar_custom_display = $options['blog_single_sidebar_custom_display'];  if ($blog_single_sidebar_custom_display == ucwords( $sidebar['id'] ) ) { echo "selected='selected'";  } }?>>
											<?php echo ucwords( $sidebar['name'] ); ?>
										</option>
										<?php
											}
										}
										?>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Show Blog Author', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[blog_author_info]">
									<option <?php if(isset($options['blog_author_info'])){$blog_author_info = $options['blog_author_info']; if ($blog_author_info == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['blog_author_info'])){$blog_author_info = $options['blog_author_info']; if ($blog_author_info == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>

							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e('Contact page', 'strata-core'); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Mail send to', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[receive_mail]" type="text" value="<?php if ($options['receive_mail']) { echo esc_attr($options['receive_mail']); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Enable Contact Form', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[enable_contact_form]">
									<option <?php if ($options['enable_contact_form'] == "no") { echo "selected='selected'"; } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if ($options['enable_contact_form'] == "yes") { echo "selected='selected'"; } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Hide Website Field', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[hide_contact_form_website]">
									<option <?php if(isset($options['hide_contact_form_website'])){ $hide_contact_form_website = $options['hide_contact_form_website']; if ($hide_contact_form_website == 'no') { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['hide_contact_form_website'])){ $hide_contact_form_website = $options['hide_contact_form_website']; if ($hide_contact_form_website == 'yes') { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Email From', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[email_from]" type="text" value="<?php if ($options['email_from']) { echo esc_attr($options['email_from']); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Email Subject', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[email_subject]" type="text" value="<?php if ($options['email_subject']) { echo esc_attr($options['email_subject']); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Use reCaptcha', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[use_recaptcha]">
									<option <?php if ($options['use_recaptcha'] == "no") { echo "selected='selected'"; } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if ($options['use_recaptcha'] == "yes") { echo "selected='selected'"; } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('ReCaptcha public key', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[recaptcha_public_key]" type="text" value="<?php if ($options['recaptcha_public_key']) { echo esc_attr($options['recaptcha_public_key']); } ?>"  />

							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('ReCaptcha private key', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[recaptcha_private_key]" type="text" value="<?php if ($options['recaptcha_private_key']) { echo esc_attr($options['recaptcha_private_key']); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Heading above contact form', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[contact_heading_above]" type="text" value="<?php if ($options['contact_heading_above']) { echo esc_attr($options['contact_heading_above']); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Enable Google Map', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[enable_google_map]">
									<option <?php if ($options['enable_google_map'] == "no") { echo "selected='selected'"; } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if ($options['enable_google_map'] == "yes") { echo "selected='selected'"; } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<?php if($options['enable_google_map'] == "yes") : ?>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Pin image', 'strata-core'); ?></td>
							<td>
								<div class="inline" style="width: 705px;">
								<input type="text" id="google_maps_pin_image" name="qode_options_theme13[google_maps_pin_image]" class="google_maps_pin_image" value="<?php if (isset($options['google_maps_pin_image'])) { echo esc_attr($options['google_maps_pin_image']); } else { echo QODE_ROOT."/img/pin.png"; } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map address', 'strata-core'); ?></td>
							<td>
								<input id="google_maps_address" name="qode_options_theme13[google_maps_address]" value="<?php if (isset($options['google_maps_address'])) { echo esc_attr($options['google_maps_address']); } ?>" size="130" />
								<?php esc_html_e('Example (Louvre Museum, Paris, France)', 'strata-core'); ?>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map address 2', 'strata-core'); ?></td>
							<td>
								<input id="google_maps_address2" name="qode_options_theme13[google_maps_address2]" value="<?php if (isset($options['google_maps_address2'])) { echo esc_attr($options['google_maps_address2']); } ?>" size="130" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map address 3', 'strata-core'); ?></td>
							<td>
								<input id="google_maps_address3" name="qode_options_theme13[google_maps_address3]" value="<?php if (isset($options['google_maps_address3'])) { echo esc_attr($options['google_maps_address3']); } ?>" size="130" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map address 4', 'strata-core'); ?></td>
							<td>
								<input id="google_maps_address4" name="qode_options_theme13[google_maps_address4]" value="<?php if (isset($options['google_maps_address4'])) { echo esc_attr($options['google_maps_address4']); } ?>" size="130" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map address 5', 'strata-core'); ?></td>
							<td>
								<input id="google_maps_address5" name="qode_options_theme13[google_maps_address5]" value="<?php if (isset($options['google_maps_address5'])) { echo esc_attr($options['google_maps_address5']); } ?>" size="130" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map zoom', 'strata-core'); ?></td>
							<td>
								<input id="google_maps_zoom" name="qode_options_theme13[google_maps_zoom]" value="<?php if (isset($options['google_maps_zoom'])) { echo esc_attr($options['google_maps_zoom']); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map height (px)', 'strata-core'); ?></td>
							<td>
								<input id="google_maps_height" name="qode_options_theme13[google_maps_height]" value="<?php if (isset($options['google_maps_height'])) { echo esc_attr($options['google_maps_height']); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map style', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[google_maps_style]">
									<option <?php if(isset($options['google_maps_style'])){ $google_maps_style = $options['google_maps_style']; if ($google_maps_style == 'no') { echo "selected='selected'"; } }  ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['google_maps_style'])){ $google_maps_style = $options['google_maps_style']; if ($google_maps_style == 'yes') { echo "selected='selected'"; } }  ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map color', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if ($options['google_maps_color']){ echo 'background-color:'.esc_attr($options['google_maps_color']).';'; } ?>"></div></div>
									<input name="qode_options_theme13[google_maps_color]" type="text" value="<?php if(isset($options['google_maps_color'])){ if ($options['google_maps_color']) { echo esc_attr($options['google_maps_color']); } } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map scroll on mouse wheel', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[google_maps_scroll_wheel]">
									<option <?php if(isset($options['google_maps_scroll_wheel'])){ $google_maps_scroll_wheel = $options['google_maps_scroll_wheel']; if ($google_maps_scroll_wheel == 'no') { echo "selected='selected'"; } }  ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['google_maps_scroll_wheel'])){ $google_maps_scroll_wheel = $options['google_maps_scroll_wheel']; if ($google_maps_scroll_wheel == 'yes') { echo "selected='selected'"; } }  ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<?php endif; ?>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e( '404 page', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Title', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[404_title]" type="text" value="<?php if ($options['404_title']) { echo esc_attr($options['404_title']); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Subtitle', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[404_subtitle]" type="text" value="<?php if (isset($options['404_subtitle']) && $options['404_subtitle']) { echo esc_attr($options['404_subtitle']); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Text', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[404_text]" type="text" value="<?php if ($options['404_text']) { echo esc_attr($options['404_text']); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Back to home label', 'strata-core'); ?></td>
							<td>
								<input name="qode_options_theme13[404_backlabel]" type="text" value="<?php if ($options['404_backlabel']) { echo esc_attr($options['404_backlabel']); } ?>"  />
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e( 'Social', 'strata-core' ); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Enable Social Share', 'strata-core'); ?></td>
							<td>
								<select name="qode_options_theme13[enable_social_share]">
									<option <?php if(isset($options['enable_social_share'])){ $enable_social_share = $options['enable_social_share']; if ($enable_social_share == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
									<option <?php if(isset($options['enable_social_share'])){ $enable_social_share = $options['enable_social_share']; if ($enable_social_share == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Facebook', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable Facebook', 'strata-core'); ?>
									<select name="qode_options_theme13[enable_facebook_share]">
										<option <?php if(isset($options['enable_facebook_share'])){ $enable_facebook_share = $options['enable_facebook_share']; if ($enable_facebook_share == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['enable_facebook_share'])){ $enable_facebook_share = $options['enable_facebook_share']; if ($enable_facebook_share == "yes") { echo "selected='selected'"; } }?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Share Icon', 'strata-core'); ?>
									<input type="text" id="facebook_icon" name="qode_options_theme13[facebook_icon]" class="facebook_icon" value="<?php if (isset($options['facebook_icon'])) { echo esc_attr($options['facebook_icon']); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Twitter', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable Twitter', 'strata-core'); ?>
									<select name="qode_options_theme13[enable_twitter_share]">
										<option <?php if(isset($options['enable_twitter_share'])){ $enable_twitter_share = $options['enable_twitter_share']; if ($enable_twitter_share == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['enable_twitter_share'])){ $enable_twitter_share = $options['enable_twitter_share']; if ($enable_twitter_share == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Share Icon', 'strata-core'); ?>
									<input type="text" id="twitter_icon" name="qode_options_theme13[twitter_icon]" class="twitter_icon" value="<?php if (isset($options['twitter_icon'])) { echo esc_attr($options['twitter_icon']); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
								<div class="inline">
									<?php esc_html_e('Via', 'strata-core'); ?>
									<input name="qode_options_theme13[twitter_via]" type="text" value="<?php if (isset($options['twitter_via'])) { echo esc_attr($options['twitter_via']); } ?>"  />
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google +', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable Google +', 'strata-core'); ?>
									<select name="qode_options_theme13[enable_google_plus]">
										<option <?php if(isset($options['enable_google_plus'])){ $enable_google_plus = $options['enable_google_plus']; if ($enable_google_plus == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['enable_google_plus'])){ $enable_google_plus = $options['enable_google_plus']; if ($enable_google_plus == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Share Icon', 'strata-core'); ?>
									<input type="text" id="google_plus_icon" name="qode_options_theme13[google_plus_icon]" class="google_plus_icon" value="<?php if (isset($options['google_plus_icon'])) { echo esc_attr($options['google_plus_icon']); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('LinkedIn', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable LinkedIn', 'strata-core'); ?>
									<select name="qode_options_theme13[enable_linkedin]">
										<option <?php if(isset($options['enable_linkedin'])){ $enable_linkedin = $options['enable_linkedin']; if ($enable_linkedin == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['enable_linkedin'])){ $enable_linkedin = $options['enable_linkedin']; if ($enable_linkedin == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Share Icon', 'strata-core'); ?>
									<input type="text" id="linkedin_icon" name="qode_options_theme13[linkedin_icon]" class="linkedin_icon" value="<?php if (isset($options['linkedin_icon'])) { echo esc_attr($options['linkedin_icon']); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Tumblr', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable Tumblr', 'strata-core'); ?>
									<select name="qode_options_theme13[enable_tumblr]">
										<option <?php if(isset($options['enable_tumblr'])){ $enable_tumblr = $options['enable_tumblr']; if ($enable_tumblr == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['enable_tumblr'])){ $enable_tumblr = $options['enable_tumblr']; if ($enable_tumblr == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Tumblr Icon', 'strata-core'); ?>
									<input type="text" id="tumblr_icon" name="qode_options_theme13[tumblr_icon]" class="tumblr_icon" value="<?php if (isset($options['tumblr_icon'])) { echo esc_attr($options['tumblr_icon']); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Pinterest', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable Pinterest', 'strata-core'); ?>
									<select name="qode_options_theme13[enable_pinterest]">
										<option <?php if(isset($options['enable_pinterest'])){ $enable_pinterest = $options['enable_pinterest']; if ($enable_pinterest == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['enable_pinterest'])){ $enable_pinterest = $options['enable_pinterest']; if ($enable_pinterest == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Pinterest Icon', 'strata-core'); ?>
									<input type="text" id="pinterest_icon" name="qode_options_theme13[pinterest_icon]" class="pinterest_icon" value="<?php if (isset($options['pinterest_icon'])) { echo esc_attr($options['pinterest_icon']); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('VK', 'strata-core'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable VK', 'strata-core'); ?>
									<select name="qode_options_theme13[enable_vk]">
										<option <?php if(isset($options['enable_vk'])){ $enable_vk = $options['enable_vk']; if ($enable_vk == "no") { echo "selected='selected'"; } } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
										<option <?php if(isset($options['enable_vk'])){ $enable_vk = $options['enable_vk']; if ($enable_vk == "yes") { echo "selected='selected'"; } } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('VK Icon', 'strata-core'); ?>
									<input type="text" id="vk_icon" name="qode_options_theme13[vk_icon]" class="vk_icon" value="<?php if (isset($options['vk_icon'])) { echo esc_attr($options['vk_icon']); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Show For', 'strata-core'); ?></td>
							<td>
							<?php
								$args_post_types = array(
								   'public'   => true
								);
								$post_types = get_post_types($args_post_types);
								foreach ($post_types as $post_type ) {
								
									$post_type_object = get_post_type_object($post_type );
									?>
								 <input type="checkbox" value="<?php echo esc_attr($post_type); ?>" <?php if (isset($options["post_types_names_$post_type"]) && ($options["post_types_names_$post_type"] == "$post_type")){ echo "checked='checked'"; }?> name="qode_options_theme13[post_types_names_<?php echo esc_attr($post_type); ?>]" /><?php echo " " . $post_type_object->labels->singular_name;  ?><br /><br />

								<?php } ?>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
		</div>
<?php	}


}



function display_save_changes_button() {
	    echo ('
		    <table class="form-table">
			<tbody>
			    <tr valign="middle">
				<th scope="row" width="150">&nbsp;</th>
				<td>
				    <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
					<input type="hidden" id="qode_submit" value="1" name="qode_submit"/>
					<input class="button-primary" type="submit" name="submit" value="'.esc_attr__('Save Changes', 'strata-core').'" />
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>');
}




$my_Qode_Theme_Options = new Qode_Theme_Options();



if(isset($qode_toolbar)):
  if(!session_id()) {
      session_start();
  }
	if (isset($_SESSION['qode_theme13_header_type'])) {
		if ($_SESSION['qode_theme13_header_type'] == "big") {
			$qode_options_theme13["header_bottom_appearance"] = "stick menu_bottom";
		}
	}
endif;