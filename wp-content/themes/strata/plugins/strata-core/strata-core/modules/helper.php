<?php

include_once 'shortcodes/shortcodes.php';
include_once 'qode-options.php';
include_once 'custom-fields.php';
include_once 'custom-fields-post-formats.php';
include_once 'qode-custom-post-types.php';
include_once 'qode-custom-taxonomy-field.php';
include_once 'qode-like.php';
include_once 'qode-seo.php';
include_once 'widgets/helper.php';

add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'call_to_action_widget', 'do_shortcode' );

if ( ! function_exists( 'strata_core_add_google_analytic' ) ) {
	function strata_core_add_google_analytic() {
		global $qode_options_theme13;
		
		if ( isset( $qode_options_theme13['google_analytics_code'] ) && $qode_options_theme13['google_analytics_code'] != "" ) { ?>
			<script>
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', '<?php echo esc_attr( $qode_options_theme13['google_analytics_code'] ); ?>']);
				_gaq.push(['_trackPageview']);
				
				(function () {
					var ga = document.createElement('script');
					ga.type = 'text/javascript';
					ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(ga, s);
				})();
			</script>
		<?php }
	}
	
	add_action( 'strata_qode_after_wrapper_inner_begin', 'strata_core_add_google_analytic' );
}

if ( ! function_exists( 'strata_core_add_content_classes' ) ) {
	function strata_core_add_content_classes( $classes ) {
		$qode_page_id = strata_qode_get_page_id();
		$animation    = get_post_meta( $qode_page_id, "qode_show-animation", true );
		
		if ( ! empty( $_SESSION['qode_animation'] ) && $animation == "" ) {
			$animation = $_SESSION['qode_animation'];
		}
		
		if ( ! empty( $animation ) ) {
			$classes .= ' ' . $animation;
		}
		
		return $classes;
	}
	
	add_filter( 'strata_qode_content_classes', 'strata_core_add_content_classes' );
}

if ( ! function_exists( 'strata_core_add_inline_html_after_content' ) ) {
	function strata_core_add_inline_html_after_content() {
		global $qode_options_theme13;
		$qode_page_id = strata_qode_get_page_id();
		$animation    = get_post_meta( $qode_page_id, "qode_show-animation", true );
		
		if ( ! empty( $_SESSION['qode_animation'] ) && $animation == "" ) {
			$animation = $_SESSION['qode_animation'];
		}
		
		if ( $qode_options_theme13['page_transitions'] == "1" || $qode_options_theme13['page_transitions'] == "2" || $qode_options_theme13['page_transitions'] == "3" || $qode_options_theme13['page_transitions'] == "4" || ( $animation == "updown" ) || ( $animation == "fade" ) || ( $animation == "updown_fade" ) || ( $animation == "leftright" ) ) { ?>
			<div class="meta">
				<?php do_action('qode_ajax_meta'); ?>
				
				<span id="qode_page_id"><?php echo esc_attr( $qode_page_id ); ?></span>
				<div class="body_classes"><?php echo implode( ',', get_body_class()); ?></div>
			</div>
		<?php }
	}
	
	add_action( 'strata_qode_after_content_begin', 'strata_core_add_inline_html_after_content' );
}

if ( ! function_exists( 'strata_core_enqueue_additional_css_styles' ) ) {
	function strata_core_enqueue_additional_css_styles() {
		$icon_packs = array(
			'font-awesome'
		);
		
		foreach ( $icon_packs as $icon_pack ) {
			wp_enqueue_style( "strata-" . $icon_pack, QODE_CSS_ROOT . "/" . $icon_pack . "/css/" . $icon_pack . ".min.css" );
		}
	}
	
	add_action( 'strata_qode_action_enqueue_before_main_css', 'strata_core_enqueue_additional_css_styles' );
}