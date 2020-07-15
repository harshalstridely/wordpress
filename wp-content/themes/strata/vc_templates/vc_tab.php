<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$tab_id = $title = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script('jquery_ui_tabs_rotate');

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_tab ui-tabs-panel wpb_ui-tabs-hide vc_clearfix tab-content', $this->settings['base']);

$output = '
	<div id="tab-' . ( empty( $tab_id ) ? sanitize_title( $title ) : esc_attr( $tab_id ) ) . '" class="' . esc_attr( $css_class ) . '">
		' . ( ( '' === trim( $content ) ) ? esc_html__( 'Empty tab. Edit page to add content here.', 'stockholm' ) : wpb_js_remove_wpautop( $content ) ) . '
	</div>
';

echo strata_qode_get_module_part($output);