<?php
/*** Removing shortcodes ***/
vc_remove_element("vc_widget_sidebar");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_button2");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_carousel");
vc_remove_element("vc_basic_grid");
vc_remove_element("vc_media_grid");
vc_remove_element("vc_masonry_grid");
vc_remove_element("vc_masonry_media_grid");
vc_remove_element("vc_icon");
vc_remove_element("vc_cta");
vc_remove_element("vc_round_chart");
vc_remove_element("vc_line_chart");
vc_remove_element("vc_tta_accordion");
vc_remove_element("vc_tta_tour");
vc_remove_element("vc_tta_tabs");
vc_remove_element("vc_section");

vc_remove_param('vc_single_image', 'css_animation');
vc_remove_param('vc_column_text', 'css_animation');
vc_remove_param('vc_row', 'full_width');
vc_remove_param('vc_row', 'bg_image');
vc_remove_param('vc_row', 'bg_color');
vc_remove_param('vc_row', 'font_color');
vc_remove_param('vc_row', 'margin_bottom');
vc_remove_param('vc_row', 'bg_image_repeat');
vc_remove_param('vc_tabs', 'interval');
vc_remove_param('vc_separator', 'style');
vc_remove_param('vc_separator', 'color');
vc_remove_param('vc_separator', 'accent_color');
vc_remove_param('vc_separator', 'el_width');
vc_remove_param('vc_text_separator', 'style');
vc_remove_param('vc_text_separator', 'color');
vc_remove_param('vc_text_separator', 'accent_color');
vc_remove_param('vc_text_separator', 'el_width');
vc_remove_param('vc_row', 'gap');
vc_remove_param('vc_row', 'columns_placement');
vc_remove_param('vc_row', 'equal_height');
vc_remove_param('vc_row_inner', 'gap');
vc_remove_param('vc_row_inner', 'content_placement');
vc_remove_param('vc_row_inner', 'equal_height');
vc_remove_param('vc_row', 'parallax_speed_video');
vc_remove_param('vc_row', 'parallax_speed_bg');
vc_remove_param('vc_row_inner', 'disable_element');
vc_remove_param('vc_row', 'disable_element');
vc_remove_param('vc_row', 'css_animation');

//remove vc parallax functionality
vc_remove_param('vc_row', 'parallax');
vc_remove_param('vc_row', 'parallax_image');

if(version_compare(strata_qode_get_vc_version(), '4.4.2') >= 0) {
    vc_remove_param('vc_accordion', 'disable_keyboard');
    vc_remove_param('vc_separator', 'align');
    vc_remove_param('vc_separator', 'border_width');
    vc_remove_param('vc_text_separator', 'align');
    vc_remove_param('vc_text_separator', 'border_width');
}

if(version_compare(strata_qode_get_vc_version(), '4.5.3') >= 0) {
	vc_remove_param('vc_row', 'video_bg');
	vc_remove_param('vc_row', 'video_bg_url');
	vc_remove_param('vc_row', 'video_bg_parallax');
	vc_remove_param('vc_row', 'full_height');
	vc_remove_param('vc_row', 'content_placement');
}

if(version_compare(strata_qode_get_vc_version(), '4.7.4') >= 0) {
		add_action( 'init', 'strata_qode_remove_vc_image_zoom',11);
		function strata_qode_remove_vc_image_zoom() {
			//Remove zoom from click action on single image
			$param = WPBMap::getParam( 'vc_single_image', 'onclick' );
			unset($param['value']['Zoom']);
			vc_update_shortcode_param( 'vc_single_image', $param );
		}
		vc_remove_param('vc_text_separator', 'css');
		vc_remove_param('vc_separator', 'css');
}


/*** Remove frontend editor ***/
if(function_exists('vc_disable_frontend')){
	vc_disable_frontend();
}

/*** Restore Tabs&Accordion from Deprecated category ***/

$vc_map_deprecated_settings = array (
	'deprecated' => false,
	'category' => esc_html__( 'Content', 'strata' )
);
vc_map_update( 'vc_accordion', $vc_map_deprecated_settings );
vc_map_update( 'vc_tabs', $vc_map_deprecated_settings );
vc_map_update( 'vc_tab', array('deprecated' => false) );
vc_map_update( 'vc_accordion_tab', array('deprecated' => false) );

$fa_icons = strata_qode_get_font_awesome_icon_array();
$icons = array();
$icons[""] = "";
foreach ($fa_icons as $key => $value) { 
	$icons[$key] = $key;
}

$carousel_sliders = strata_qode_get_carousel_slider_array();

$animations = array(
	"" => "",
	esc_html__( "Elements Shows From Left Side", 'strata' ) => "element_from_left",
	esc_html__( "Elements Shows From Right Side", 'strata' ) => "element_from_right",
	esc_html__( "Elements Shows From Top Side", 'strata' ) => "element_from_top",
	esc_html__( "Elements Shows From Bottom Side", 'strata' ) => "element_from_bottom",
	esc_html__( "Elements Shows From Fade", 'strata' ) => "element_from_fade"
);

/*** Accordion ***/

vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Style", 'strata' ),
	"param_name" => "style",
	"value" => array(
		esc_html__( "Accordion", 'strata' ) => "accordion",
		esc_html__( "Toggle", 'strata' ) => "toggle",
		esc_html__( "Accordion with icon", 'strata' ) => "accordion_with_icon",
		esc_html__( "Toggle with icon", 'strata' ) => "toggle_with_icon"
	),
	'save_always' => true,
	
));

vc_add_param("vc_accordion_tab", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Icon", 'strata' ),
	"param_name" => "icon",
	"value" => $icons,
	'save_always' => true
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Icon Color", 'strata' ),
	"param_name" => "icon_color",
	"value" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Title Color", 'strata' ),
	"param_name" => "title_color",
	"value" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Background Color", 'strata' ),
	"param_name" => "background_color",
	"value" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "dropdown",
    "class" => "",
    "heading" => esc_html__( "Title Tag", 'strata' ),
    "param_name" => "title_tag",
    "value" => array(
        ""   => "",
        esc_html__( "h2", 'strata' ) => "h2",
        esc_html__( "h3", 'strata' ) => "h3",
        esc_html__( "h4", 'strata' ) => "h4",
        esc_html__( "h5", 'strata' ) => "h5",
        esc_html__( "h6", 'strata' ) => "h6",
    )
));

/*** Tabs ***/

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Style", 'strata' ),
	"param_name" => "style",
	"value" => array(
		esc_html__( "Horizontal Center", 'strata' ) => "horizontal",
		esc_html__( "Boxed", 'strata' ) => "boxed",
		esc_html__( "Vertical Left", 'strata' ) => "vertical",
		esc_html__( "Vertical Right", 'strata' ) => "vertical_right"
	),
	'save_always' => true
));

/*** Gallery ***/

vc_add_param("vc_gallery", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Column Number", 'strata' ),
	"param_name" => "column_number",
	 "value" => array(2, 3, 4, 5, esc_html__( "Disable", 'strata' ) => 0),
	'save_always' => true,
	 "dependency" => Array('element' => "type", 'value' => array('image_grid'))
));

/*** Row ***/

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => esc_html__( "Row Type", 'strata' ),
	"param_name" => "row_type",
	"value" => array(
		esc_html__( "Row", 'strata' ) => "row",
		esc_html__( "Parallax", 'strata' ) => "parallax",
		esc_html__( "Expandable", 'strata' ) => "expandable",
		esc_html__( "Content menu", 'strata' ) => "content_menu"
	),
	'save_always' => true,
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Type", 'strata' ),
	"param_name" => "type",
	"value" => array(
		esc_html__( "Full Width", 'strata' ) => "full_width",
		esc_html__( "In Grid", 'strata' ) => "grid"
	),
	'save_always' => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Anchor ID", 'strata' ),
	"param_name" => "anchor",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Row in content menu", 'strata' ),
	"param_name" => "in_content_menu",
	"value" => array(
		esc_html__( "No", 'strata' ) => "",
		esc_html__( "Yes", 'strata' ) => "in_content_menu"
	),
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Content menu title", 'strata' ),
	"value" => "",
	"param_name" => "content_menu_title",
	"dependency" => Array('element' => "in_content_menu", 'value' => array('in_content_menu'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Content menu icon", 'strata' ),
	"param_name" => "content_menu_icon",
	"value" => $icons,
	'save_always' => true,
	"dependency" => Array('element' => "in_content_menu", 'value' => array('in_content_menu'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Text Align", 'strata' ),
	"param_name" => "text_align",
	"value" => array(
		esc_html__( "Left", 'strata' ) => "left",
		esc_html__( "Center", 'strata' ) => "center",
		esc_html__( "Right", 'strata' ) => "right"
	),
	'save_always' => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Video background", 'strata' ),
	"param_name" => "video",
	"value" => array(
		esc_html__( "No", 'strata' ) => "",
		esc_html__( "Yes", 'strata' ) => "show_video"
	),
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Video overlay", 'strata' ),
	"param_name" => "video_overlay",
	"value" => array(
		esc_html__( "No", 'strata' ) => "",
		esc_html__( "Yes", 'strata' ) => "show_video_overlay"
	),
	'save_always' => true,
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => esc_html__( "Video overlay image (pattern)", 'strata' ),
	"value" => "",
	"param_name" => "video_overlay_image",
	"dependency" => Array('element' => "video_overlay", 'value' => array('show_video_overlay'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Video background (webm) file url", 'strata' ),
	"value" => "",
	"param_name" => "video_webm",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Video background (mp4) file url", 'strata' ),
	"value" => "",
	"param_name" => "video_mp4",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Video background (ogv) file url", 'strata' ),
	"value" => "",
	"param_name" => "video_ogv",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => esc_html__( "Video preview image", 'strata' ),
	"value" => "",
	"param_name" => "video_image",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => esc_html__( "Background image", 'strata' ),
	"value" => "",
	"param_name" => "background_image",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax', 'row'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Section height", 'strata' ),
	"param_name" => "section_height",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Background color", 'strata' ),
	"param_name" => "background_color",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable','content_menu'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Border bottom color", 'strata' ),
	"param_name" => "border_color",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Padding", 'strata' ),
	"value" => "",
	"param_name" => "padding",
	"description" => esc_html__( "Padding (left/right in % - full width only)", 'strata' ),
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Padding Top", 'strata' ),
	"value" => "",
	"param_name" => "padding_top",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Padding Bottom", 'strata' ),
	"value" => "",
	"param_name" => "padding_bottom",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "More Button Label", 'strata' ),
	"param_name" => "more_button_label",
	"value" =>  "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Less Button Label", 'strata' ),
	"param_name" => "less_button_label",
	"value" =>  "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Button Position", 'strata' ),
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		esc_html__( "Left", 'strata' ) => "left",
		esc_html__( "Right", 'strata' ) => "right",
		esc_html__( "Center", 'strata' ) => "center"
	),
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Color", 'strata' ),
	"param_name" => "color",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row",  array(
  "type" => "dropdown",
  "heading" => esc_html__( "CSS Animation", 'strata' ),
  "param_name" => "css_animation",
  "admin_label" => true,
  "value" => $animations,
  'save_always' => true,
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row",  array(
  "type" => "textfield",
  "heading" => esc_html__( "Transition delay (s)", 'strata' ),
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
));

/*** Row Inner ***/

vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => esc_html__( "Row Type", 'strata' ),
	"param_name" => "row_type",
	"value" => array(
		esc_html__( "Row", 'strata' ) => "row",
		esc_html__( "Parallax", 'strata' ) => "parallax",
		esc_html__( "Expandable", 'strata' ) => "expandable"
	),
	'save_always' => true
));
vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__( "Use as box", 'strata' ),
	"value" => array( esc_html__( "Use row as box", 'strata' ) => "use_row_as_box" ),
	"param_name" => "use_as_box",
	"description" => esc_html__( '', 'strata' ),
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Type", 'strata' ),
	"param_name" => "type",
	"value" => array(
		esc_html__( "In Grid", 'strata' ) => "grid",
		esc_html__( "Full Width", 'strata' ) => "full_width"
	),
	'save_always' => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Anchor ID", 'strata' ),
	"param_name" => "anchor",
	"value" => ""
));

vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Text Align", 'strata' ),
	"param_name" => "text_align",
	"value" => array(
		esc_html__( "Left", 'strata' ) => "left",
		esc_html__( "Center", 'strata' ) => "center",
		esc_html__( "Right", 'strata' ) => "right"
	),
	'save_always' => true
));

vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Background color", 'strata' ),
	"param_name" => "background_color",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => esc_html__( "Background image", 'strata' ),
	"value" => "",
	"param_name" => "background_image",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Section height", 'strata' ),
	"param_name" => "section_height",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));

vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Border color", 'strata' ),
	"param_name" => "border_color",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Padding", 'strata' ),
	"value" => "",
	"param_name" => "padding",
	"description" => esc_html__( "Padding (left/right in % - full width only)", 'strata' ),
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Padding Top", 'strata' ),
	"value" => "",
	"param_name" => "padding_top",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Padding Bottom", 'strata' ),
	"value" => "",
	"param_name" => "padding_bottom",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "More Button Label", 'strata' ),
	"param_name" => "more_button_label",
	"value" =>  "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Less Button Label", 'strata' ),
	"param_name" => "less_button_label",
	"value" =>  "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Button Position", 'strata' ),
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		esc_html__( "Left", 'strata' ) => "left",
		esc_html__( "Right", 'strata' ) => "right",
		esc_html__( "Center", 'strata' ) => "center"
	),
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Color", 'strata' ),
	"param_name" => "color",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row_inner",  array(
	"type" => "dropdown",
	"heading" => esc_html__( "CSS Animation", 'strata' ),
	"param_name" => "css_animation",
	"admin_label" => true,
	"value" => $animations,
	'save_always' => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner",  array(
  "type" => "textfield",
  "heading" => esc_html__( "Transition delay", 'strata' ),
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
));

/*** Separator ***/


$separator_setting = array (
  'show_settings_on_create' => true,
  "controls"	=> '',
);
vc_map_update('vc_separator', $separator_setting);


vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Type", 'strata' ),
	"param_name" => "type",
	"value" => array(
		esc_html__( "Normal", 'strata' )		=>	"normal",
		esc_html__( "Transparent", 'strata' )	=>	"transparent",
		esc_html__( "Full width", 'strata' )	=>	"full_width",
		esc_html__( "Small", 'strata' )			=>	"small"
	),
	'save_always' => true,
));

vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Position", 'strata' ),
	"param_name" => "position",
	"value" => array(
		esc_html__( "Center", 'strata' ) => "center",
		esc_html__( "Left", 'strata' ) => "left",
		esc_html__( "Right", 'strata' ) => "right"
	),
	'save_always' => true,
    "dependency" => array("element" => "type", "value" => array("small"))
));

vc_add_param("vc_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Color", 'strata' ),
	"param_name" => "color",
	"value" => ""
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Thickness", 'strata' ),
	"param_name" => "thickness",
	"value" => ""
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Top Margin", 'strata' ),
	"param_name" => "up",
	"value" => ""
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Bottom Margin", 'strata' ),
	"param_name" => "down",
	"value" => ""
));

/*** Separator With Text ***/

vc_add_param("vc_text_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Border", 'strata' ),
	"param_name" => "border",
	"value" => array(
		esc_html__( "No", 'strata' ) => "no",
		esc_html__( "Yes", 'strata' ) => "yes"
	),
	'save_always' => true,
));

vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Border Color", 'strata' ),
	"param_name" => "border_color",
	"dependency" => Array('element' => "border", 'value' => array('yes'))
));

vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Background Color", 'strata' ),
	"param_name" => "background_color",
));

vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__( "Title Color", 'strata' ),
	"param_name" => "title_color",
));

/*** Single Image ***/

vc_add_param("vc_single_image",  array(
  "type" => "dropdown",
  "heading" => esc_html__( "CSS Animation", 'strata' ),
  "param_name" => "qode_css_animation",
  "admin_label" => true,
  "value" => $animations,
	'save_always' => true
));

vc_add_param("vc_single_image",  array(
  "type" => "textfield",
  "heading" => esc_html__( "Transition delay (s)", 'strata' ),
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => ""
));
/*** Testimonials ***/

vc_map( array(
		"name" => esc_html__( "Testimonials", 'strata' ),
		"base" => "testimonials",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-testimonials",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Type", 'strata' ),
                "param_name" => "type",
                "value" => array(
                    esc_html__( "Standard", 'strata' ) => "standard",
                    esc_html__( "Full width", 'strata' ) => "full_width"
                ),
				'save_always' => true
            ),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Content in grid", 'strata' ),
                "param_name" => "content_in_grid",
                "value" => array(
                    esc_html__( "No", 'strata' ) => "0",
                    esc_html__( "Yes", 'strata' ) => "1"
                ),
				'save_always' => true,
                "description" => esc_html__( "Use only if testimonial is in full width row", 'strata' ),
				"dependency" => array("element" => "type", "value" => array("full_width")),
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Category", 'strata' ),
				"param_name" => "category",
				"value" => "",
				"description" => esc_html__( "Category Slug (leave empty for all)", 'strata' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Number", 'strata' ),
				"param_name" => "number",
				"value" => "",
				"description" => esc_html__( "Number of Testimonials", 'strata' )
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Color", 'strata' ),
				"param_name" => "text_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Background Color", 'strata' ),
				"param_name" => "background_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Color", 'strata' ),
				"param_name" => "border_color",
				
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Show author image", 'strata' ),
                "param_name" => "author_image",
                "value" => array(
                    esc_html__( "Yes", 'strata' ) => "yes",
                    esc_html__( "No", 'strata' ) => "no"
                ),
				'save_always' => true,
                
            )
		)
) );

/*** Portfolio ***/

vc_map( array(
		"name" => esc_html__( "Portfolio List", 'strata' ),
		"base" => "portfolio_list",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-portfolio",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
				"value" => array(
					esc_html__( "Standard", 'strata' ) => "standard",
					esc_html__( "Standard No Space", 'strata' ) => "standard_no_space",
					esc_html__( "Hover Text", 'strata' ) => "hover_text",
					esc_html__( "Hover Text No Space", 'strata' ) => "hover_text_no_space"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Columns", 'strata' ),
				"param_name" => "columns",
				"value" => array(
					"" => "",
					"2" => "2",
					"3" => "3",	
					"4" => "4",	
					"5" => "5",	
					"6" => "6"	
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order By", 'strata' ),
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					esc_html__( "Menu Order", 'strata' ) => "menu_order",
					esc_html__( "Title", 'strata' ) => "title",
					esc_html__( "Date", 'strata' ) => "date"
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order", 'strata' ),
				"param_name" => "order",
				"value" => array(
					"" => "",
					esc_html__( "ASC", 'strata' ) => "ASC",
					esc_html__( "DESC", 'strata' ) => "DESC",
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Filter", 'strata' ),
				"param_name" => "filter",
				"value" => array(
					"" => "",
					esc_html__( "Yes", 'strata' ) => "yes",
					esc_html__( "No", 'strata' ) => "no"
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Lightbox", 'strata' ),
				"param_name" => "lightbox",
				"value" => array(
					"" => "",
					esc_html__( "Yes", 'strata' ) => "yes",
					esc_html__( "No", 'strata' ) => "no"
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Show Load More", 'strata' ),
				"param_name" => "show_load_more",
				"value" => array(
					"" => "",
					esc_html__( "Yes", 'strata' ) => "yes",
					esc_html__( "No", 'strata' ) => "no"
				),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Number", 'strata' ),
				"param_name" => "number",
				"value" => "-1",
				"description" => esc_html__( "Number of portolios on page (-1 is all)", 'strata' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Category", 'strata' ),
				"param_name" => "category",
				"value" => "",
				"description" => esc_html__( "Category Slug (leave empty for all)", 'strata' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Selected Projects", 'strata' ),
				"param_name" => "selected_projects",
				"value" => "",
				"description" => esc_html__( "Selected Projects (leave empty for all, delimit by comma)", 'strata' )
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				
            )
		)
) );

/*** Portfolio Slider ***/

vc_map( array(
		"name" => esc_html__( "Portfolio Slider", 'strata' ),
		"base" => "portfolio_slider",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-portfolio_slider",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order By", 'strata' ),
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					esc_html__( "Menu Order", 'strata' ) => "menu_order",
					esc_html__( "Title", 'strata' ) => "title",
					esc_html__( "Date", 'strata' ) => "date"
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order", 'strata' ),
				"param_name" => "order",
				"value" => array(
					"" => "",
					esc_html__( "ASC", 'strata' ) => "ASC",
					esc_html__( "DESC", 'strata' ) => "DESC",
				),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Number", 'strata' ),
				"param_name" => "number",
				"value" => "-1",
				"description" => esc_html__( "Number of portolios on page (-1 is all)", 'strata' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Category", 'strata' ),
				"param_name" => "category",
				"value" => "",
				"description" => esc_html__( "Category Slug (leave empty for all)", 'strata' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Selected Projects", 'strata' ),
				"param_name" => "selected_projects",
				"value" => "",
				"description" => esc_html__( "Selected Projects (leave empty for all, delimit by comma)", 'strata' )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Lightbox", 'strata' ),
				"param_name" => "lightbox",
				"value" => array(
					"" => "",
					esc_html__( "Yes", 'strata' ) => "yes",
					esc_html__( "No", 'strata' ) => "no"
				),
				
			),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__( "Title Tag", 'strata' ),
                "param_name" => "title_tag",
                "value" => array(
                    ""   => "",
                    esc_html__( "h2", 'strata' ) => "h2",
                    esc_html__( "h3", 'strata' ) => "h3",
                    esc_html__( "h4", 'strata' ) => "h4",
                    esc_html__( "h5", 'strata' ) => "h5",
                    esc_html__( "h6", 'strata' ) => "h6",
                ),
                
            )
		)
) );

/*** Qode Carousel ***/

vc_map( array(
		"name" => esc_html__( "Qode Carousel", 'strata' ),
		"base" => "qode_carousel",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-qode_carousel",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Carousel Slider", 'strata' ),
				"param_name" => "carousel",
				"value" => $carousel_sliders,
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order By", 'strata' ),
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					esc_html__( "Menu Order", 'strata' ) => "menu_order",
					esc_html__( "Title", 'strata' ) => "title",
					esc_html__( "Date", 'strata' ) => "date"
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order", 'strata' ),
				"param_name" => "order",
				"value" => array(
					"" => "",
					esc_html__( "ASC", 'strata' ) => "ASC",
					esc_html__( "DESC", 'strata' ) => "DESC",
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Control Pagination Style", 'strata' ),
				"param_name" => "control_style",
				"value" => array(
					esc_html__( "Light", 'strata' ) => "light",
					esc_html__( "Gray", 'strata' ) => "gray",
				),
				'save_always' => true,
				
			)
		)
) );

/*** Counter ***/

vc_map( array(
		"name" => esc_html__( "Counter", 'strata' ),
		"base" => "counter",
		"category" => esc_html__( 'by QODE', 'strata' ),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-counter",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
				"value" => array(
					esc_html__( "Zero Counter", 'strata' ) => "zero",
					esc_html__( "Random Counter", 'strata' ) => "random"
				),
				'save_always' => true,
				
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Box", 'strata' ),
                "param_name" => "box",
                "value" => array(
                    esc_html__( "Yes", 'strata' ) => "yes",
                    esc_html__( "No", 'strata' ) => "no"
                ),
				'save_always' => true,
                
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Box Border Color", 'strata' ),
                "param_name" => "box_border_color",
                "dependency" => array('element' => "box", 'value' => array('yes'))
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Position", 'strata' ),
				"param_name" => "position",
				"value" => array(
					esc_html__( "Left", 'strata' ) => "left",
					esc_html__( "Right", 'strata' ) => "right",
					esc_html__( "Center", 'strata' ) => "center"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Digit", 'strata' ),
				"param_name" => "digit",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Font size (px)", 'strata' ),
				"param_name" => "font_size",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Font Color", 'strata' ),
				"param_name" => "font_color",
				
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Text", 'strata' ),
                "param_name" => "text",
                
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Text Size (px)", 'strata' ),
                "param_name" => "text_size",
                
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Text Color", 'strata' ),
                "param_name" => "text_color",
                
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Separator", 'strata' ),
                "param_name" => "separator",
                "value" => array(
                    esc_html__( "Yes", 'strata' ) => "yes",
                    esc_html__( "No", 'strata' ) => "no"
                ),
				'save_always' => true,
                
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Separator Color", 'strata' ),
                "param_name" => "separator_color",
                "dependency" => array('element' => "separator", 'value' => array('yes'))
            )
		)
) );

// Cover Boxes
vc_map( array(
		"name" => esc_html__( "Cover Boxes", 'strata' ),
		"base" => "cover_boxes",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-cover_boxes",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Image 1", 'strata' ),
				"param_name" => "image1"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title 1", 'strata' ),
				"param_name" => "title1",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color 1", 'strata' ),
				"param_name" => "title_color1",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text 1", 'strata' ),
				"param_name" => "text1",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Color 1", 'strata' ),
				"param_name" => "text_color1",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link 1", 'strata' ),
				"param_name" => "link1",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link label 1", 'strata' ),
				"param_name" => "link_label1",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Target 1", 'strata' ),
				"param_name" => "target1",
				"value" => array(
					esc_html__( "Self", 'strata' ) => "_self",
					esc_html__( "Blank", 'strata' ) => "_blank",
					esc_html__( "Parent", 'strata' ) => "_parent",
					esc_html__( "Top", 'strata' ) => "_top"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Image 2", 'strata' ),
				"param_name" => "image2"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title 2", 'strata' ),
				"param_name" => "title2",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color 2", 'strata' ),
				"param_name" => "title_color2",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text 2", 'strata' ),
				"param_name" => "text2",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Color 2", 'strata' ),
				"param_name" => "text_color2",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link 2", 'strata' ),
				"param_name" => "link2",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link label 2", 'strata' ),
				"param_name" => "link_label2",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Target 2", 'strata' ),
				"param_name" => "target2",
				"value" => array(
					esc_html__( "Self", 'strata' ) => "_self",
					esc_html__( "Blank", 'strata' ) => "_blank",
					esc_html__( "Parent", 'strata' ) => "_parent",
					esc_html__( "Top", 'strata' ) => "_top"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Image 3", 'strata' ),
				"param_name" => "image3"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title 3", 'strata' ),
				"param_name" => "title3",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color 3", 'strata' ),
				"param_name" => "title_color3",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text 3", 'strata' ),
				"param_name" => "text3",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Color 3", 'strata' ),
				"param_name" => "text_color3",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link 3", 'strata' ),
				"param_name" => "link3",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link label 3", 'strata' ),
				"param_name" => "link_label3",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Target 3", 'strata' ),
				"param_name" => "target3",
				"value" => array(
					esc_html__( "Self", 'strata' ) => "_self",
					esc_html__( "Blank", 'strata' ) => "_blank",
					esc_html__( "Parent", 'strata' ) => "_parent",
					esc_html__( "Top", 'strata' ) => "_top"
				),
				'save_always' => true,
				
			)
		)
) );

/*** Icon List Item ***/

vc_map( array(
		"name" => esc_html__( "Icon List Item", 'strata' ),
		"base" => "icon_list_item",
		"icon" => "icon-wpb-icon_list_item",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				
				),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__( "Icon Type", 'strata' ),
                "param_name" => "icon_type",
                "value" => array(
                    esc_html__( "Circle", 'strata' )        => "circle",
                    esc_html__( "Transparent", 'strata' )   => "transparent"
                ),
				'save_always' => true,
                
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Top Gradient Background Color", 'strata' ),
				"param_name" => "icon_top_gradient_background_color",
                "dependency" => array('element' => "icon_type", 'value' => array('circle'))
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Icon Bottom Gradient Background Color", 'strata' ),
                "param_name" => "icon_bottom_gradient_background_color",
                "dependency" => array('element' => "icon_type", 'value' => array('circle'))
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Border Color", 'strata' ),
				"param_name" => "icon_border_color",
                "dependency" => array('element' => "icon_type", 'value' => array('circle'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color", 'strata' ),
				"param_name" => "title_color",
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Title size (px)", 'strata' ),
                "param_name" => "title_size",
            ),
		)
) );

/*** Call to action ***/

vc_map( array(
		"name" => esc_html__( "Call to Action", 'strata' ),
		"base" => "action",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-action",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
				"value" => array(
					esc_html__( "Normal", 'strata' ) => "normal",
					esc_html__( "With Icon", 'strata' ) => "with_icon"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Size", 'strata' ),
				"param_name" => "icon_size",
				"value" => array(
					"" => "",
					esc_html__( "Small", 'strata' ) => "fa-lg",
					esc_html__( "Medium", 'strata' ) => "fa-2x",
					esc_html__( "Large", 'strata' ) => "fa-3x"
				),
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Custom Icon", 'strata' ),
				"param_name" => "custom_icon",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Background Color", 'strata' ),
				"param_name" => "background_color",
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Color", 'strata' ),
				"param_name" => "border_color",
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Show Button", 'strata' ),
                "param_name" => "show_button",
                "value" => array(
                    esc_html__( "Yes", 'strata' ) => "yes",
                    esc_html__( "No", 'strata' ) => "no"
                ),
				'save_always' => true,
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Button Text", 'strata' ),
                "param_name" => "button_text",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Button Link", 'strata' ),
				"param_name" => "button_link",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Button Target", 'strata' ),
                "param_name" => "button_target",
                "value" => array(
                    "" => "",
                    esc_html__( "Self", 'strata' ) => "_self",
                    esc_html__( "Blank", 'strata' ) => "_blank",
                    esc_html__( "Parent", 'strata' ) => "_parent"
                ),
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Button text color", 'strata' ),
                "param_name" => "button_text_color",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Button Top Gradient", 'strata' ),
                "param_name" => "button_top_gradient",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Button Bottom Gradient", 'strata' ),
                "param_name" => "button_bottom_gradient",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Button Border Color", 'strata' ),
                "param_name" => "button_border_color",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "<p>".esc_html__( "I am test text for Call to action.", 'strata' )."</p>",
			)
		)
) );

// Blockquote 
vc_map( array(
		"name" => esc_html__( "Blockquote", 'strata' ),
		"base" => "blockquote",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text", 'strata' ),
				"param_name" => "text",
				"value" => esc_html__( "Blockquote text", 'strata' ),
				'save_always' => true
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Color", 'strata' ),
				"param_name" => "text_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Width", 'strata' ),
				"param_name" => "width",
				"description" => esc_html__( "Width (%)", 'strata' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Line Height", 'strata' ),
				"param_name" => "line_height",
				"description" => esc_html__( "Line Height (px)", 'strata' )
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Background Color", 'strata' ),
				"param_name" => "background_color",
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Color", 'strata' ),
				"param_name" => "border_color",
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Show Quote Icon", 'strata' ),
                "param_name" => "show_quote_icon",
                "value" => array(
                    esc_html__( "No", 'strata' ) => "no",
                    esc_html__( "Yes", 'strata' ) => "yes"
                ),
				'save_always' => true,
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Quote Icon Color", 'strata' ),
                "param_name" => "quote_icon_color",
                "dependency" => array('element' => "show_quote_icon", 'value' => 'yes'),
            )
		)
) );

// Button 
vc_map( array(
		"name" => esc_html__( "Button", 'strata' ),
		"base" => "button",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-button",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Size", 'strata' ),
				"param_name" => "size",
				"value" => array(
					esc_html__( "Default", 'strata' ) => "",
                    esc_html__( "Tiny", 'strata' ) => "tiny",
                    esc_html__( "Small", 'strata' ) => "small",
					esc_html__( "Medium", 'strata' ) => "medium",
					esc_html__( "Large", 'strata' ) => "large",
					esc_html__( "Big Large", 'strata' ) => "big_large",
					esc_html__( "Big Large full width", 'strata' ) => "big_large_full_width"
				),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text", 'strata' ),
				"param_name" => "text",
				
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Size", 'strata' ),
				"param_name" => "icon_size",
				"value" => array(
					esc_html__( "Tiny", 'strata' ) => "fa-lg",
					esc_html__( "Small", 'strata' ) => "fa-2x",
					esc_html__( "Medium", 'strata' ) => "fa-3x",
					esc_html__( "Large", 'strata' ) => "fa-4x",
					esc_html__( "Very Large", 'strata' ) => "fa-5x"
				),
				'save_always' => true,
				"dependency" => Array('element' => "icon", 'not_empty' => true),
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				"dependency" => Array('element' => "icon", 'not_empty' => true),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link", 'strata' ),
				"param_name" => "link",
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link Target", 'strata' ),
				"param_name" => "target",
				"value" => array(
					esc_html__( "Self", 'strata' ) => "_self",
					esc_html__( "Blank", 'strata' ) => "_blank",
					esc_html__( "Parent", 'strata' ) => "_parent",
					esc_html__( "Top", 'strata' ) => "_top"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Color", 'strata' ),
				"param_name" => "color",
				
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Top Gradient Color", 'strata' ),
                "param_name" => "top_gradient_color",
                
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Bottom Gradient Color", 'strata' ),
                "param_name" => "bottom_gradient_color",
                
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Color", 'strata' ),
				"param_name" => "border_color",
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Font Style", 'strata' ),
				"param_name" => "font_style",
				"value" => array(
					"" => "",
					esc_html__( "Normal", 'strata' ) => "normal",
					esc_html__( "Italic", 'strata' ) => "italic"
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Font Weight", 'strata' ),
				"param_name" => "font_weight",
				"value" => array(
					"" => "",
					esc_html__( "100", 'strata' ) => "100",
					esc_html__( "200", 'strata' ) => "200",
					esc_html__( "300", 'strata' ) => "300",
					esc_html__( "400", 'strata' ) => "400",
					esc_html__( "500", 'strata' ) => "500",
					esc_html__( "600", 'strata' ) => "600",
					esc_html__( "700", 'strata' ) => "700",
					esc_html__( "800", 'strata' ) => "800",
					esc_html__( "900", 'strata' ) => "900"
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Align", 'strata' ),
				"param_name" => "text_align",
				"value" => array(
					"" => "",
					esc_html__( "Left", 'strata' ) => "left",
					esc_html__( "Right", 'strata' ) => "right",
					esc_html__( "Center", 'strata' ) => "center"
				),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Margin", 'strata' ),
				"param_name" => "margin",
				"description" => esc_html__( "Please insert margin in format: 0px 0px 1px 0px", 'strata' )
			),
		)
) );

// Image with text 
vc_map( array(
		"name" => esc_html__( "Image With Text", 'strata' ),
		"base" => "image_with_text",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-image_with_text",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Image", 'strata' ),
				"param_name" => "image"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color", 'strata' ),
				"param_name" => "title_color",
				
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				
            ),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "<p>".esc_html__( "I am test text for Image with text shortcode.", 'strata' )."</p>",
				
			)
		)
) );

//Message
vc_map( array(
		"name" => esc_html__( "Message", 'strata' ),
		"base" => "message",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-message",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
				"value" => array(
					esc_html__( "Normal", 'strata' ) => "normal",
					esc_html__( "With Icon", 'strata' ) => "with_icon"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Size", 'strata' ),
				"param_name" => "icon_size",
				"value" => array(
					esc_html__( "Small", 'strata' ) => "fa-lg",
					esc_html__( "Medium", 'strata' ) => "fa-2x",
					esc_html__( "Large", 'strata' ) => "fa-3x"
				),
				'save_always' => true,
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__( "Icon Background Color", 'strata' ),
				"param_name" => "icon_background_color",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Custom Icon", 'strata' ),
				"param_name" => "custom_icon",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Background Color", 'strata' ),
				"param_name" => "background_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Color", 'strata' ),
				"param_name" => "border_color",
				
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Close Button Style", 'strata' ),
				"param_name" => "close_button_style",
				"value" => array(
					esc_html__( "Dark", 'strata' ) => "dark",
					esc_html__( "Light", 'strata' ) => "light"
				),
				'save_always' => true,
				
                        ),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "<p>".esc_html__( "I am test text for Message shortcode.", 'strata' )."</p>",
				
			)
		)
) );

// Pie Chart
vc_map( array(
		"name" => esc_html__( "Pie Chart", 'strata' ),
		"base" => "pie_chart",
		"icon" => "icon-wpb-pie_chart",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Percentage", 'strata' ),
				"param_name" => "percent",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Percentage Color", 'strata' ),
				"param_name" => "percentage_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Bar Active Color", 'strata' ),
				"param_name" => "active_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Bar Noactive Color", 'strata' ),
				"param_name" => "noactive_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Pie Chart Line Width (px)", 'strata' ),
				"param_name" => "line_width",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color", 'strata' ),
				"param_name" => "title_color",
				
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text", 'strata' ),
				"param_name" => "text",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Color", 'strata' ),
				"param_name" => "text_color",
				
			)
		)
) );

// Pie Chart With Icon
vc_map( array(
		"name" => esc_html__( "Pie Chart With Icon", 'strata' ),
		"base" => "pie_chart_with_icon",
		"icon" => "icon-wpb-pie_chart_with_icon",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Percentage", 'strata' ),
				"param_name" => "percent",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Bar Active Color", 'strata' ),
				"param_name" => "active_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Bar Noactive Color", 'strata' ),
				"param_name" => "noactive_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Pie Chart Line Width (px)", 'strata' ),
				"param_name" => "line_width",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color", 'strata' ),
				"param_name" => "title_color",
				
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Size", 'strata' ),
				"param_name" => "icon_size",
				"value" => array(
					esc_html__( "Tiny", 'strata' ) => "fa-lg",
					esc_html__( "Small", 'strata' ) => "fa-2x",
					esc_html__( "Medium", 'strata' ) => "fa-3x",
					esc_html__( "Large", 'strata' ) => "fa-4x",
					esc_html__( "Very Large", 'strata' ) => "fa-5x"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text", 'strata' ),
				"param_name" => "text",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Color", 'strata' ),
				"param_name" => "text_color",
				
			)
		)
) );

// Pie Chart 2 (Pie)
vc_map( array(
		"name" => esc_html__( "Pie Chart 2 (Pie)", 'strata' ),
		"base" => "pie_chart2",
		"icon" => "icon-wpb-pie_chart2",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Width", 'strata' ),
				"param_name" => "width",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Height", 'strata' ),
				"param_name" => "height",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Legend Text Color", 'strata' ),
				"param_name" => "color",
				
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "15,#00aeef,Legend One; 35,#4cc6f4,Legend Two; 50,#99dff9,Legend Three",
				
			)

		)
) );
// Pie Chart 3 (Doughnut)
vc_map( array(
		"name" => esc_html__( "Pie Chart 3 (Doughnut)", 'strata' ),
		"base" => "pie_chart3",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-pie_chart3",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Width", 'strata' ),
				"param_name" => "width",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Height", 'strata' ),
				"param_name" => "height",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Legend Text Color", 'strata' ),
				"param_name" => "color",
				
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "15,#00aeef,Legend One; 35,#4cc6f4,Legend Two; 50,#99dff9,Legend Three",
				
			)

		)
) );

// Horizontal progress bar shortcode
vc_map( array(
		"name" => esc_html__( "Progress Bar - Horizontal", 'strata' ),
		"base" => "progress_bar",
		"icon" => "icon-wpb-progress_bar",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color", 'strata' ),
				"param_name" => "title_color",
				
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Percentage", 'strata' ),
				"param_name" => "percent",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Percentage Color", 'strata' ),
				"param_name" => "percent_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Active Background Color", 'strata' ),
				"param_name" => "active_background_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Active Border Color", 'strata' ),
				"param_name" => "active_border_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Inactive Background Color", 'strata' ),
				"param_name" => "noactive_background_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Progress Bar Height (px)", 'strata' ),
				"param_name" => "height",
				
			)
		)
) );

// Vertical progress bar shortcode
vc_map( array(
		"name" => esc_html__( "Progress Bar - Vertical", 'strata' ),
		"base" => "progress_bar_vertical",
		"icon" => "icon-wpb-vertical_progress_bar",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				
			),
            array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color", 'strata' ),
				"param_name" => "title_color",
				
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				
            ),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Size", 'strata' ),
				"param_name" => "title_size",
				
			),
            array (
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Bar Top Gradient Color", 'strata' ),
                "param_name" => "bar_top_gradient_color",
                
            ),
            array (
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Bar Bottom Gradient Color", 'strata' ),
                "param_name" => "bar_bottom_gradient_color",
                
            ),
            array (
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Bar Border Color", 'strata' ),
                "param_name" => "bar_border_color",
                
            ),
			array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Background Top Gradient Color", 'strata' ),
				"param_name" => "background_top_gradient_color",
				
			),
            array (
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Background Bottom Gradient Color", 'strata' ),
                "param_name" => "background_bottom_gradient_color",
                
            ),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Percent", 'strata' ),
				"param_name" => "percent",
				
			),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Percentage Text Size", 'strata' ),
				"param_name" => "percentage_text_size",
				
			),
            array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Percentage Color", 'strata' ),
				"param_name" => "percent_color",
				
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text", 'strata' ),
				"param_name" => "text",
				"value" => esc_html__( "Put some content here", 'strata' )
				
			)
		)
) );

// Icon Progress Bar
vc_map( array(
		"name" => esc_html__( "Progress Bar - Icon", 'strata' ),
		"base" => "progress_bar_icon",
		"icon" => "icon-wpb-progress_bar_icon",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Number of Icons", 'strata' ),
				"param_name" => "icons_number",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Number of Active Icons", 'strata' ),
				"param_name" => "active_number",
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
				"value" => array(
					esc_html__( "Normal", 'strata' ) => "normal",
					esc_html__( "Circle", 'strata' ) => "circle",
					esc_html__( "Square", 'strata' ) => "square"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Size", 'strata' ),
				"param_name" => "size",
				"value" => array(
					esc_html__( "Tiny", 'strata' ) => "tiny",
					esc_html__( "Small", 'strata' ) => "small",
					esc_html__( "Medium", 'strata' ) => "medium",
					esc_html__( "Large", 'strata' ) => "large",
					esc_html__( "Very Large", 'strata' ) => "very_large",
				),
				'save_always' => true,
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Custom Size (px)", 'strata' ),
				"param_name" => "custom_size",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Active Color", 'strata' ),
				"param_name" => "icon_active_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Background Color", 'strata' ),
				"param_name" => "background_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Background Active Color", 'strata' ),
				"param_name" => "background_active_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Color", 'strata' ),
				"param_name" => "border_color",
				"description" => esc_html__( "Only for Square and Circle type", 'strata' ),
				"dependency" => array('element' => "type", 'value' => array('square', 'circle'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Active Color", 'strata' ),
				"param_name" => "border_active_color",
				"description" => esc_html__( "Only for Square and Circle type", 'strata' ),
				"dependency" => array('element' => "type", 'value' => array('square', 'circle'))
			)
		)
) );

// Line Graph shortcode
vc_map( array(
		"name" => esc_html__( "Line Graph", 'strata' ),
		"base" => "line_graph",
		"icon" => "icon-wpb-line_graph",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
				"value" => array(
					"" => "",
					esc_html__( "Rounded edges", 'strata' ) => "rounded",
					esc_html__( "Sharp edges", 'strata' ) => "sharp"
				),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Width", 'strata' ),
				"param_name" => "width",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Height", 'strata' ),
				"param_name" => "height",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Custom Color", 'strata' ),
				"param_name" => "custom_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Scale steps", 'strata' ),
				"param_name" => "scale_steps",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Scale step width", 'strata' ),
				"param_name" => "scale_step_width",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Labels", 'strata' ),
				"param_name" => "labels",
				"value" => esc_html__( "Label 1, Label 2, Label 3", 'strata' )
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "#00aeef,Legend One,1,5,10;#4cc6f4,Legend Two,3,7,20;#99dff9,Legend Three,10,2,34",
				
			)
		)
) );

// Pricing table shortcode
vc_map( array(
		"name" => esc_html__( "Pricing Table", 'strata' ),
		"base" => "pricing_column",
		"icon" => "icon-wpb-pricing_column",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				"value" => esc_html__( "Basic Plan", 'strata' ),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Subtitle", 'strata' ),
				"param_name" => "subtitle",
				"value" => "",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Price", 'strata' ),
				"param_name" => "price",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Currency", 'strata' ),
				"param_name" => "currency",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Price Period", 'strata' ),
				"param_name" => "price_period",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link for button 1", 'strata' ),
				"param_name" => "link",
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Target for button 1", 'strata' ),
				"param_name" => "target",
				"value" => array(
					"" => "",
					esc_html__( "Self", 'strata' ) => "_self",
					esc_html__( "Blank", 'strata' ) => "_blank",
					esc_html__( "Parent", 'strata' ) => "_parent"
				),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Button Text For button 1", 'strata' ),
				"param_name" => "button_text",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link for Button 2", 'strata' ),
				"param_name" => "link2",
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Target For Button 2", 'strata' ),
				"param_name" => "target2",
				"value" => array(
					"" => "",
					esc_html__( "Self", 'strata' ) => "_self",
					esc_html__( "Blank", 'strata' ) => "_blank",
					esc_html__( "Parent", 'strata' ) => "_parent"
				),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Button Text For Button 2", 'strata' ),
				"param_name" => "button_text2",
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Active", 'strata' ),
				"param_name" => "active",
				"value" => array(
					esc_html__( "No", 'strata' ) => "no",
					esc_html__( "Yes", 'strata' ) => "yes"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "<li>content content content</li><li>content content content</li><li>content content content</li>",
				
			)
		)
) );

// Social Share
vc_map( array(
		"name" => esc_html__( "Social Share", 'strata' ),
		"base" => "social_share",
		"icon" => "icon-wpb-social_share",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"show_settings_on_create" => false
) );

// Custom Font
vc_map( array(
		"name" => esc_html__( "Custom Font", 'strata' ),
		"base" => "custom_font",
		"icon" => "icon-wpb-custom_font",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Font family", 'strata' ),
				"param_name" => "font_family",
				"value" => "Roboto"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Font size", 'strata' ),
				"param_name" => "font_size",
				"value" => "15",
				'save_always' => true
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Line height", 'strata' ),
				"param_name" => "line_height",
				"value" => "26",
				'save_always' => true
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Font Style", 'strata' ),
				"param_name" => "font_style",
				"value" => array(
					esc_html__( "Normal", 'strata' ) => "normal",
					esc_html__( "Italic", 'strata' ) => "italic"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Align", 'strata' ),
				"param_name" => "text_align",
				"value" => array(
					esc_html__( "Left", 'strata' ) => "left",
					esc_html__( "Center", 'strata' ) => "center",
					esc_html__( "Right", 'strata' ) => "right"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Font weight", 'strata' ),
				"param_name" => "font_weight",
				"value" => "300",
				'save_always' => true
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Color", 'strata' ),
				"param_name" => "color",
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text decoration", 'strata' ),
				"param_name" => "text_decoration",
				"value" => array(
					esc_html__( "None", 'strata' ) => "none",
					esc_html__( "Underline", 'strata' ) => "underline",
					esc_html__( "Overline", 'strata' ) => "overline",
					esc_html__( "Line Through", 'strata' ) => "line-through"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text shadow", 'strata' ),
				"param_name" => "text_shadow",
				"value" => array(
					esc_html__( "No", 'strata' ) => "no",
					esc_html__( "Yes", 'strata' ) => "yes"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Background Color", 'strata' ),
				"param_name" => "background_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Padding (px)", 'strata' ),
				"param_name" => "padding",
				"value" => "0"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Margin (px)", 'strata' ),
				"param_name" => "margin",
				"value" => "0"
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "<p>content content content</p>",
				
			)
		)
) );

// Ordered List
vc_map( array(
		"name" => esc_html__( "List - Ordered", 'strata' ),
		"base" => "ordered_list",
		"icon" => "icon-wpb-ordered_list",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "<ol><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ol>",
				
			)

		)
) );

// Unordered List
vc_map( array(
		"name" => esc_html__( "List - Unordered", 'strata' ),
		"base" => "unordered_list",
		"icon" => "icon-wpb-unordered_list",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Style", 'strata' ),
				"param_name" => "style",
				"value" => array(
					esc_html__( "Circle", 'strata' ) => "circle",
					esc_html__( "Number", 'strata' ) => "number"
				),
				'save_always' => true,
				
			),
            array(
                "type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Number Type", 'strata' ),
				"param_name" => "number_type",
				"value" => array(
					esc_html__( "Circle", 'strata' ) => "circle_number",
					esc_html__( "Transparent", 'strata' ) => "transparent_number"
				),
				'save_always' => true,
                "dependency" => array('element' => "style", 'value' => array('number'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Animate List", 'strata' ),
				"param_name" => "animate",
				"value" => array(
					esc_html__( "No", 'strata' ) => "no",
					esc_html__( "Yes", 'strata' ) => "yes"
				),
				'save_always' => true,
				
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Font Weight", 'strata' ),
				"param_name" => "font_weight",
				"value" => array(
                    esc_html__( "Default", 'strata' ) => "",
					esc_html__( "Light", 'strata' ) => "light",
					esc_html__( "Normal", 'strata' ) => "normal",
                    esc_html__( "Bold", 'strata' ) => "bold"
				),
				
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>",
				
			)
		)
) );

// Icon
vc_map( array(
		"name" => esc_html__( "Icon", 'strata' ),
		"base" => "icons",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-icons",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Size", 'strata' ),
				"param_name" => "size",
				"value" => array(
					esc_html__( "Tiny", 'strata' ) => "fa-lg",
					esc_html__( "Small", 'strata' ) => "fa-2x",
					esc_html__( "Medium", 'strata' ) => "fa-3x",
					esc_html__( "Large", 'strata' ) => "fa-4x",
					esc_html__( "Very Large", 'strata' ) => "fa-5x"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Custom Size (px)", 'strata' ),
				"param_name" => "custom_size",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
				"value" => array(
					esc_html__( "Normal", 'strata' ) => "normal",
					esc_html__( "Circle", 'strata' ) => "circle",
					esc_html__( "Square", 'strata' ) => "square"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Position", 'strata' ),
				"param_name" => "position",
				"value" => array(
					esc_html__( "Normal", 'strata' ) => "",
					esc_html__( "Left", 'strata' ) => "left",
					esc_html__( "Center", 'strata' ) => "center",
					esc_html__( "Right", 'strata' ) => "right"
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border", 'strata' ),
				"param_name" => "border",
				"value" => array(
					esc_html__( "Yes", 'strata' ) => "yes",
					esc_html__( "No", 'strata' ) => "no"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Color", 'strata' ),
				"param_name" => "border_color",
				"description" => esc_html__( "Only for Square type", 'strata' ),
				"dependency" => Array('element' => "type", 'value' => array('square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Background Color", 'strata' ),
				"param_name" => "background_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Margin", 'strata' ),
				"param_name" => "margin",
				"description" => esc_html__( "Margin (top right bottom left)", 'strata' )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Animation", 'strata' ),
				"param_name" => "icon_animation",
				"value" => array(
					esc_html__( "No", 'strata' ) => "",
					esc_html__( "Yes", 'strata' ) => "q_icon_animation"
				),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Animation Delay (ms)", 'strata' ),
				"param_name" => "icon_animation_delay",
				"value" => "",
                
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link", 'strata' ),
				"param_name" => "link",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Target", 'strata' ),
				"param_name" => "target",
				"value" => array(
					esc_html__( "Self", 'strata' ) => "_self",
					esc_html__( "Blank", 'strata' ) => "_blank",
					esc_html__( "Parent", 'strata' ) => "_parent"
				),
				'save_always' => true,
				
			)
		)
) );

// Social Icon 
vc_map( array(
		"name" => esc_html__( "Social Icons", 'strata' ),
		"base" => "social_icons",
		"icon" => "icon-wpb-social_icons",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
				"value" => array(
					esc_html__( "Circle", 'strata' ) => "circle_social",
					esc_html__( "Normal", 'strata' ) => "normal_social"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => array(
					""          	   => "",
					esc_html__( "ADN", 'strata' )          	   => "fa-adn",
					esc_html__( "Android", 'strata' )          => "fa-android",
					esc_html__( "Apple", 'strata' )            => "fa-apple",
					esc_html__( "Behance", 'strata' )          => "fa-behance",
					esc_html__( "Bitbucket", 'strata' )        => "fa-bitbucket",
					esc_html__( "Bitbucket-Square", 'strata' ) => "fa-bitbucket-square",
					esc_html__( "Bitcoin", 'strata' )          => "fa-bitcoin",
					esc_html__( "BTC", 'strata' )              => "fa-btc",
					esc_html__( "CSS3", 'strata' )             => "fa-css3",
					esc_html__( "Codepen", 'strata' )          => "fa-codepen",
					esc_html__( "Digg", 'strata' )             => "fa-digg",
					esc_html__( "Drupal", 'strata' )           => "fa-drupal",
					esc_html__( "Dribbble", 'strata' )         => "fa-dribbble",
					esc_html__( "Dropbox", 'strata' )          => "fa-dropbox",
					esc_html__( "Facebook", 'strata' )         => "fa-facebook",
					esc_html__( "Facebook-Square", 'strata' )  => "fa-facebook-square",
					esc_html__( "Flickr", 'strata' )           => "fa-flickr",
					esc_html__( "Foursquare", 'strata' )       => "fa-foursquare",
					esc_html__( "GitHub", 'strata' )           => "fa-github",
					esc_html__( "GitHub-Alt", 'strata' )       => "fa-github-alt",
					esc_html__( "GitHub-Square", 'strata' )    => "fa-github-square",
					esc_html__( "Gittip", 'strata' )      	   => "fa-gittip",
					esc_html__( "Google", 'strata' )      	   => "fa-google",
					esc_html__( "Google Plus", 'strata' )      => "fa-google-plus",
					esc_html__( "Google Plus-Square", 'strata' ) => "fa-google-plus-square",
					esc_html__( "HTML5", 'strata' )      	   => "fa-html5",
					esc_html__( "Instagram", 'strata' )        => "fa-instagram",
					esc_html__( "LinkedIn", 'strata' )         => "fa-linkedin",
					esc_html__( "LinkedIn-Square", 'strata' )  => "fa-linkedin-square",
					esc_html__( "Linux", 'strata' )      	   => "fa-linux",
					esc_html__( "MaxCDN", 'strata' )      	   => "fa-maxcdn",
					esc_html__( "Pinterest" , 'strata' )       => "fa-pinterest",
					esc_html__( "Pinterest-Square", 'strata' ) => "fa-pinterest-square",
					esc_html__( "Reddit", 'strata' )      	   => "fa-reddit",
					esc_html__( "Renren", 'strata' )      	   => "fa-renren",
					esc_html__( "Skype", 'strata' )      	   => "fa-skype",
					esc_html__( "StackExchange", 'strata' )    => "fa-stackexchange",
					esc_html__( "Soundcloud", 'strata' )       => "fa-soundcloud",
					esc_html__( "Spotify", 'strata' )      	   => "fa-spotify",
					esc_html__( "Trello", 'strata' )      	   => "fa-trello",
					esc_html__( "Tumblr", 'strata' )      	   => "fa-tumblr",
					esc_html__( "Tumblr-Square", 'strata' )    => "fa-tumblr-square",
					esc_html__( "Twitter", 'strata' )      	   => "fa-twitter",
					esc_html__( "Twitter-Square", 'strata' )   => "fa-twitter-square",
					esc_html__( "VK", 'strata' )      		   => "fa-vk",
					esc_html__( "Weibo", 'strata' )      	   => "fa-weibo",
					esc_html__( "Windows", 'strata' )      	   => "fa-windows",
					esc_html__( "Xing", 'strata' )      	   => "fa-xing",
					esc_html__( "Xing-Square", 'strata' )      => "fa-xing-square",
					esc_html__( "Yahoo" , 'strata' )     	   => "fa-yahoo",
					esc_html__( "YouTube", 'strata' )      	   => "fa-youtube",
					esc_html__( "YouTube Play", 'strata' )     => "fa-youtube-play",
					esc_html__( "YouTube-Square", 'strata' )   => "fa-youtube-square"
				),
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Size", 'strata' ),
				"param_name" => "size",
				"value" => array(
					esc_html__( "Small", 'strata' ) => "fa-lg",
					esc_html__( "Normal", 'strata' ) => "fa-2x",
					esc_html__( "Large", 'strata' ) => "fa-3x",
					esc_html__( "Very Large", 'strata' ) => "fa-4x"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link", 'strata' ),
				"param_name" => "link",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Target", 'strata' ),
				"param_name" => "target",
				"value" => array(
					esc_html__( "Self", 'strata' ) => "_self",
					esc_html__( "Blank", 'strata' ) => "_blank",
					esc_html__( "Parent", 'strata' ) => "_parent"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Top Gradient Background Color", 'strata' ),
				"param_name" => "top_gradient_background_color",
				"dependency" => Array('element' => "type", 'value' => array('circle_social'))
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Bottom Gradient Background Color", 'strata' ),
				"param_name" => "bottom_gradient_background_color",
				"dependency" => Array('element' => "type", 'value' => array('circle_social'))
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Color", 'strata' ),
				"param_name" => "border_color",
				"dependency" => Array('element' => "type", 'value' => array('circle_social'))
			)
		)
) );

// Icon with Text
vc_map( array(
		"name" => esc_html__( "Icon With Text", 'strata' ),
		"base" => "icon_text",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Box type", 'strata' ),
				"param_name" => "box_type",
				"value" => array(
					esc_html__( "Normal", 'strata' ) => "normal",
					esc_html__( "Icon in a box", 'strata' ) => "icon_in_a_box"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Box Border", 'strata' ),
				"param_name" => "box_border",
				"value" => array(
					esc_html__( "Yes", 'strata' ) => "yes",
					esc_html__( "No", 'strata' ) => "no"
				),
				'save_always' => true,
				"dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Box Border Color", 'strata' ),
				"param_name" => "box_border_color",
				"dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Box Background Color", 'strata' ),
				"param_name" => "box_background_color",
				"dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Type", 'strata' ),
				"param_name" => "icon_type",
				"value" => array(
					esc_html__( "Normal", 'strata' ) => "normal",
					esc_html__( "Circle", 'strata' ) => "circle",
					esc_html__( "Square", 'strata' ) => "square"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Size / Icon Space From Text", 'strata' ),
				"param_name" => "icon_size",
				"value" => array(
					esc_html__( "Tiny", 'strata' ) => "fa-lg",
					esc_html__( "Small", 'strata' ) => "fa-2x",
					esc_html__( "Medium", 'strata' ) => "fa-3x",
					esc_html__( "Large", 'strata' ) => "fa-4x",
					esc_html__( "Very Large", 'strata' ) => "fa-5x"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Custom Icon Size (px)", 'strata' ),
				"param_name" => "custom_icon_size",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Animation", 'strata' ),
				"param_name" => "icon_animation",
				"value" => array(
					esc_html__( "No", 'strata' ) => "",
					esc_html__( "Yes", 'strata' ) => "q_icon_animation"
				),
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Animation Delay (ms)", 'strata' ),
				"param_name" => "icon_animation_delay",
				"value" => "",
                "dependency" => Array('element' => "icon_animation", 'value' => array('q_icon_animation'))
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Image", 'strata' ),
				"param_name" => "image"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon/Image Position", 'strata' ),
				"param_name" => "icon_position",
				"value" => array(
					esc_html__( "Top", 'strata' ) => "top",
					esc_html__( "Left", 'strata' ) => "left",
					esc_html__( "Left From Title", 'strata' ) => "left_from_title"
				),
				'save_always' => true,
				"description" => esc_html__( "Icon Position (only for normal box type)", 'strata' ),
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Margin", 'strata' ),
				"param_name" => "icon_margin",
				"value" => "",
                "description" => esc_html__( "Margin should be set in a top right bottom left format", 'strata' )
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Border Color", 'strata' ),
				"param_name" => "icon_border_color",
				"description" => esc_html__( "Only for Square and Circle type", 'strata' ),
				"dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Background Color", 'strata' ),
				"param_name" => "icon_background_color",
				"description" => esc_html__( "Icon Background Color (only for square and circle icon type)", 'strata' ),
				"dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				"value" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color", 'strata' ),
				"param_name" => "title_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text", 'strata' ),
				"param_name" => "text",
				"value" => ""
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Color", 'strata' ),
				"param_name" => "text_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link", 'strata' ),
				"param_name" => "link",
				"value" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link Text", 'strata' ),
				"param_name" => "link_text",
				"value" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link Color", 'strata' ),
				"param_name" => "link_color",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Target", 'strata' ),
				"param_name" => "target",
				"value" => array(
                    ""   => "",
					esc_html__( "Self", 'strata' ) => "_self",
					esc_html__( "Blank", 'strata' ) => "_blank",
					esc_html__( "Parent", 'strata' ) => "_parent",
				),
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
            )
		)
) );

/*** Latest Posts ***/

vc_map( array(
		"name" => esc_html__( "Latest Posts", 'strata' ),
		"base" => "latest_post",
		"icon" => "icon-wpb-latest_post",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
				"value" => array(
					esc_html__( "With date in left box", 'strata' ) => "date_in_box",
					esc_html__( "Image in left box", 'strata' ) => "image_in_box",
					esc_html__( "Minimal", 'strata' ) => "minimal",
					esc_html__( "Boxes", 'strata' ) => "boxes"
				),
				'save_always' => true,
				
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Number of Posts", 'strata' ),
                "param_name" => "number_of_posts",
                "dependency" => Array('element' => "type", 'value' => array('date_in_box', 'image_in_box', 'minimal'))
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Number of Colums", 'strata' ),
                "param_name" => "number_of_colums",
                "value" => array(
					esc_html__( "Two", 'strata' ) => "2",
					esc_html__( "Three", 'strata' ) => "3",
					esc_html__( "Four", 'strata' ) => "4"
				),
				'save_always' => true,
                "dependency" => Array('element' => "type", 'value' => array('boxes'))
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order By", 'strata' ),
				"param_name" => "order_by",
				"value" => array(
					esc_html__( "Title", 'strata' ) => "title",
					esc_html__( "Date", 'strata' ) => "date"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order", 'strata' ),
				"param_name" => "order",
				"value" => array(
					esc_html__( "ASC", 'strata' ) => "ASC",
					esc_html__( "DESC", 'strata' ) => "DESC"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Category Slug", 'strata' ),
				"param_name" => "category",
				"description" => esc_html__( "Leave empty for all or use comma for list", 'strata' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text length", 'strata' ),
				"param_name" => "text_length",
				"description" => esc_html__( "Number of characters", 'strata' )
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Display category", 'strata' ),
				"param_name" => "display_category",
				"value" => array(
					esc_html__( "Yes", 'strata' ) => "1",
					esc_html__( "No", 'strata' ) => "0"
				),
				'save_always' => true,
				"description" => esc_html__( '', 'strata' )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Display time", 'strata' ),
				"param_name" => "display_time",
				"value" => array(
					esc_html__( "Yes", 'strata' ) => "1",
					esc_html__( "No", 'strata' ) => "0"
				),
				'save_always' => true,
				"description" => esc_html__( '', 'strata' )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Display comments", 'strata' ),
				"param_name" => "display_comments",
				"value" => array(
					esc_html__( "Yes", 'strata' ) => "1",
					esc_html__( "No", 'strata' ) => "0"
				),
				'save_always' => true,
				"description" => esc_html__( '', 'strata' )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Display like", 'strata' ),
				"param_name" => "display_like",
				"value" => array(
					esc_html__( "Yes", 'strata' ) => "1",
					esc_html__( "No", 'strata' ) => "0"
				),
				'save_always' => true,
				"description" => esc_html__( '', 'strata' )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Display share", 'strata' ),
				"param_name" => "display_share",
				"value" => array(
					esc_html__( "Yes", 'strata' ) => "1",
					esc_html__( "No", 'strata' ) => "0"
				),
				'save_always' => true,
				"description" => esc_html__( '', 'strata' )
			)
		)
) );

// Steps
vc_map( array(
    "name" => esc_html__( "Steps", 'strata' ),
    "base" => "steps",
    "category" => esc_html__( 'by QODE', 'strata' ),
    "icon" => "icon-wpb-steps",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__( "Number Of Steps", 'strata' ),
            "param_name" => "number_of_steps",
            "value" => array(
	            esc_html__( "Default", 'strata' )   => "",
                "2" => "2",
                "3" => "3",
                "4" => "4"
            ),
            "description" => esc_html__( "Number of steps in the process", 'strata' )
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Background Color", 'strata' ),
            "param_name" => "background_color",
            "description" => esc_html__( "Background color of the step holder", 'strata' )
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Number Color", 'strata' ),
            "param_name" => "number_color",
            
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title Color", 'strata' ),
            "param_name" => "title_color",
            
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Circle Wrapper Border Color", 'strata' ),
            "param_name" => "circle_wrapper_border_color",
            "description" => esc_html__( "Color of rotated border", 'strata' )
        ),

        //first step config
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title 1", 'strata' ),
            "param_name" => "title_1"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Number 1", 'strata' ),
            "param_name" => "step_number_1"
        ),
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Description 1", 'strata' ),
            "param_name" => "step_description_1"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Link 1", 'strata' ),
            "param_name" => "step_link_1",
            
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__( "Step Link Target 1", 'strata' ),
            "param_name" => "step_link_target_1",
            "value" => array(
                esc_html__( "Blank", 'strata' ) => "_blank",
                esc_html__( "Self", 'strata' )   => "_self",
                esc_html__( "Parent", 'strata' ) => "_parent",
                esc_html__( "Top", 'strata' ) => "_top"
            ),
			'save_always' => true,
            
        ),

        //second step config
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title 2", 'strata' ),
            "param_name" => "title_2",
            
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Number 2", 'strata' ),
            "param_name" => "step_number_2",
            
        ),
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Description 2", 'strata' ),
            "param_name" => "step_description_2",
            
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Link 2", 'strata' ),
            "param_name" => "step_link_2",
            
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__( "Step Link Target 2", 'strata' ),
            "param_name" => "step_link_target_2",
            "value" => array(
                esc_html__( "Blank", 'strata' ) => "_blank",
                esc_html__( "Self", 'strata' )   => "_self",
                esc_html__( "Parent", 'strata' ) => "_parent",
                esc_html__( "Top", 'strata' ) => "_top"
            ),
			'save_always' => true,
            
        ),

        //third step config
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title 3", 'strata' ),
            "param_name" => "title_3",
            "dependency" => array('element' => "number_of_steps", 'value' => array('' ,'3', '4'))
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Number 3", 'strata' ),
            "param_name" => "step_number_3",
            "dependency" => array('element' => "number_of_steps", 'value' => array('' ,'3', '4'))
        ),
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Description 3", 'strata' ),
            "param_name" => "step_description_3",
            "dependency" => array('element' => "number_of_steps", 'value' => array('' ,'3', '4'))
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Link 3", 'strata' ),
            "param_name" => "step_link_3",
            "dependency" => array('element' => "number_of_steps", 'value' => array('' ,'3', '4'))
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__( "Step Link Target 3", 'strata' ),
            "param_name" => "step_link_target_3",
            "value" => array(
                esc_html__( "Blank", 'strata' ) => "_blank",
                esc_html__( "Self", 'strata' )   => "_self",
                esc_html__( "Parent", 'strata' ) => "_parent",
                esc_html__( "Top", 'strata' ) => "_top"
            ),
			'save_always' => true,
            
        ),

        //fourth step config
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title 4", 'strata' ),
            "param_name" => "title_4",
            "dependency" => array('element' => "number_of_steps", 'value' => array('' , '4'))
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Number 4", 'strata' ),
            "param_name" => "step_number_4",
            "dependency" => array('element' => "number_of_steps", 'value' => array('' , '4'))
        ),
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Description 4", 'strata' ),
            "param_name" => "step_description_4",
            "dependency" => array('element' => "number_of_steps", 'value' => array('' , '4'))
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Step Link 4", 'strata' ),
            "param_name" => "step_link_4",
            "dependency" => array('element' => "number_of_steps", 'value' => array('' , '4'))
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__( "Step Link Target 4", 'strata' ),
            "param_name" => "step_link_target_4",
            "value" => array(
                esc_html__( "Blank", 'strata' ) => "_blank",
                esc_html__( "Self", 'strata' )   => "_self",
                esc_html__( "Parent", 'strata' ) => "_parent",
                esc_html__( "Top", 'strata' ) => "_top"
            ),
			'save_always' => true,
            
        )
    )
) );


// Image with text over
vc_map( array(
		"name" => esc_html__( "Image With Text Over", 'strata' ),
		"base" => "image_with_text_over",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-image_with_text_over",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Width", 'strata' ),
				"param_name" => "layout_width",
				"value" => array(
                    ""   => "",
                    esc_html__( "1/2", 'strata' ) => "one_half",
					esc_html__( "1/3", 'strata' ) => "one_third",
					esc_html__( "1/4", 'strata' ) => "one_fourth",
				),
				
            ),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Image", 'strata' ),
				"param_name" => "image"
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon Size", 'strata' ),
				"param_name" => "icon_size",
				"value" => array(
					esc_html__( "Tiny", 'strata' ) => "fa-lg",
					esc_html__( "Small", 'strata' ) => "fa-2x",
					esc_html__( "Medium", 'strata' ) => "fa-3x",
					esc_html__( "Large", 'strata' ) => "fa-4x",
					esc_html__( "Very Large", 'strata' ) => "fa-5x"
				),
				'save_always' => true,
				
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color", 'strata' ),
				"param_name" => "title_color",
				
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Size (px)", 'strata' ),
				"param_name" => "title_size",
				
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				
            ),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "<p>".esc_html__( "I am test text for Image with text shortcode.", 'strata' )."</p>",
				
			)
		)
) );

/**
 * Service shortcode
 */
vc_map( array(
		"name" => esc_html__( "Service", 'strata' ),
		"base" => "service",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-service",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
                "value" => array(
					"" => "",
					esc_html__( "Top", 'strata' ) => "top",
					esc_html__( "Left", 'strata' ) => "left"
				)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color", 'strata' ),
				"param_name" => "color",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link", 'strata' ),
				"param_name" => "link",
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Target", 'strata' ),
				"param_name" => "target",
                "value" => array(
					"" => "",
					esc_html__( "Self", 'strata' ) => "_self",
					esc_html__( "Blank", 'strata' ) => "_blank",
					esc_html__( "Parent", 'strata' ) => "_parent"
				)
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Animate", 'strata' ),
				"param_name" => "animate",
                "value" => array(
					"" => "",
					esc_html__( "Yes", 'strata' ) => "yes",
					esc_html__( "No", 'strata' ) => "no"
				)
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'strata' ),
				"param_name" => "content",
				"value" => "<p>" . esc_html__( "I am test text for service shortcode." , 'strata' ). "</p>",
				
			)
		)
) );

// Image hover
vc_map( array(
		"name" => esc_html__( "Image Hover", 'strata' ),
		"base" => "image_hover",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-image_hover",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Image", 'strata' ),
				"param_name" => "image"
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Hover Image", 'strata' ),
				"param_name" => "hover_image"
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Link", 'strata' ),
				"param_name" => "link",
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Target", 'strata' ),
				"param_name" => "target",
                "value" => array(
                    esc_html__( "Self", 'strata' ) => "_self",
                    esc_html__( "Blank", 'strata' ) => "_blank",
                    esc_html__( "Parent", 'strata' ) => "_parent"
                ),
				'save_always' => true,
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Animation", 'strata' ),
				"param_name" => "animation",
                "value" => array(
                    "" => "",
                    esc_html__( "Yes", 'strata' ) => "yes",
                    esc_html__( "No", 'strata' ) => "no"
                )
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Transition delay", 'strata' ),
				"param_name" => "transition_delay",
                "dependency" => array('element' => "animation", 'value' => array("yes"))
			)
		)
) );

$social_icons_array = array(
	"" => "",
	esc_html__( "ADN", 'strata' ) => "fa-adn",
	esc_html__( "Android", 'strata' ) => "fa-android",
	esc_html__( "Apple", 'strata' ) => "fa-apple",
	esc_html__( "Bitbucket", 'strata' ) => "fa-bitbucket",
	esc_html__( "Bitbucket-Sign", 'strata' ) => "fa-bitbucket-sign",
	esc_html__( "Bitcoin", 'strata' ) => "fa-bitcoin",
	esc_html__( "BTC", 'strata' ) => "fa-btc",
	esc_html__( "CSS3", 'strata' ) => "fa-css3",
	esc_html__( "Dribbble", 'strata' ) => "fa-dribbble",
	esc_html__( "Dropbox", 'strata' ) => "fa-dropbox",
	esc_html__( "Facebook", 'strata' ) => "fa-facebook",
	esc_html__( "Facebook-Sign", 'strata' ) => "fa-facebook-sign",
	esc_html__( "Flickr", 'strata' ) => "fa-flickr",
	esc_html__( "Foursquare", 'strata' ) => "fa-foursquare",
	esc_html__( "GitHub", 'strata' ) => "fa-github",
	esc_html__( "GitHub-Alt", 'strata' ) => "fa-github-alt",
	esc_html__( "GitHub-Sign", 'strata' ) => "fa-github-sign",
	esc_html__( "Gittip", 'strata' ) => "fa-gittip",
	esc_html__( "Google Plus", 'strata' ) => "fa-google-plus",
	esc_html__( "Google Plus-Sign", 'strata' ) => "fa-google-plus-sign",
	esc_html__( "HTML5", 'strata' ) => "fa-html5",
	esc_html__( "Instagram", 'strata' ) => "fa-instagram",
	esc_html__( "LinkedIn", 'strata' ) => "fa-linkedin",
	esc_html__( "LinkedIn-Sign", 'strata' ) => "fa-linkedin-sign",
	esc_html__( "Linux", 'strata' ) => "fa-linux",
	esc_html__( "MaxCDN", 'strata' ) => "fa-maxcdn",
	esc_html__( "Pinterest", 'strata' ) => "fa-pinterest",
	esc_html__( "Pinterest-Sign", 'strata' ) => "fa-pinterest-sign",
	esc_html__( "Renren", 'strata' ) => "fa-renren",
	esc_html__( "Skype", 'strata' ) => "fa-skype",
	esc_html__( "StackExchange", 'strata' ) => "fa-stackexchange",
	esc_html__( "Trello", 'strata' ) => "fa-trello",
	esc_html__( "Tumblr", 'strata' ) => "fa-tumblr",
	esc_html__( "Tumblr-Sign", 'strata' ) => "fa-tumblr-sign",
	esc_html__( "Twitter", 'strata' ) => "fa-twitter",
	esc_html__( "Twitter-Sign", 'strata' ) => "fa-twitter-sign",
	esc_html__( "VK", 'strata' ) => "fa-vk",
	esc_html__( "Weibo", 'strata' ) => "fa-weibo",
	esc_html__( "Windows", 'strata' ) => "fa-windows",
	esc_html__( "Xing", 'strata' ) => "fa-xing",
	esc_html__( "Xing-Sign", 'strata' ) => "fa-xing-sign",
	esc_html__( "YouTube", 'strata' ) => "fa-youtube",
	esc_html__( "YouTube Play", 'strata' ) => "fa-youtube-play",
	esc_html__( "YouTube-Sign", 'strata' ) => "fa-youtube-sign"
);

/*** Team Shortcode ***/

vc_map( array(
		"name" => esc_html__( "Team", 'strata' ),
		"base" => "q_team",
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-q_team",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Image", 'strata' ),
				"param_name" => "team_image"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Name", 'strata' ),
				"param_name" => "team_name"
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Position", 'strata' ),
				"param_name" => "team_position"
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Description", 'strata' ),
				"param_name" => "team_description"
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Socia Icon 1", 'strata' ),
				"param_name" => "team_social_icon_1",
				"value" =>$social_icons_array,
				'save_always' => true,
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Socia Icon 1 Link", 'strata' ),
				"param_name" => "team_social_icon_1_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Socia Icon 1 Target", 'strata' ),
                "param_name" => "team_social_icon_1_target",
                "value" => array(
                    "" => "",
                    esc_html__( "Self", 'strata' ) => "_self",
                    esc_html__( "Blank", 'strata' ) => "_blank",
                    esc_html__( "Parent", 'strata' ) => "_parent"
                ),
                
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Socia Icon 2", 'strata' ),
				"param_name" => "team_social_icon_2",
				"value" =>$social_icons_array,
				'save_always' => true,
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Socia Icon 2 Link", 'strata' ),
				"param_name" => "team_social_icon_2_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Socia Icon 2 Target", 'strata' ),
                "param_name" => "team_social_icon_2_target",
                "value" => array(
                    "" => "",
                    esc_html__( "Self", 'strata' ) => "_self",
                    esc_html__( "Blank", 'strata' ) => "_blank",
                    esc_html__( "Parent", 'strata' ) => "_parent"
                ),
                
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Socia Icon 3", 'strata' ),
				"param_name" => "team_social_icon_3",
				"value" =>$social_icons_array,
				'save_always' => true,
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Socia Icon 3 Link", 'strata' ),
				"param_name" => "team_social_icon_3_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Socia Icon 3 Target", 'strata' ),
                "param_name" => "team_social_icon_3_target",
                "value" => array(
                    "" => "",
                    esc_html__( "Self", 'strata' ) => "_self",
                    esc_html__( "Blank", 'strata' ) => "_blank",
                    esc_html__( "Parent", 'strata' ) => "_parent"
                ),
                
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Socia Icon 4", 'strata' ),
				"param_name" => "team_social_icon_4",
				"value" =>$social_icons_array,
				'save_always' => true,
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Socia Icon 4 Link", 'strata' ),
				"param_name" => "team_social_icon_4_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Socia Icon 4 Target", 'strata' ),
                "param_name" => "team_social_icon_4_target",
                "value" => array(
                    "" => "",
                    esc_html__( "Self", 'strata' ) => "_self",
                    esc_html__( "Blank", 'strata' ) => "_blank",
                    esc_html__( "Parent", 'strata' ) => "_parent"
                ),
                
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Socia Icon 5", 'strata' ),
				"param_name" => "team_social_icon_5",
				"value" =>$social_icons_array,
				'save_always' => true,
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Socia Icon 5 Link", 'strata' ),
				"param_name" => "team_social_icon_5_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Socia Icon 5 Target", 'strata' ),
                "param_name" => "team_social_icon_5_target",
                "value" => array(
                    "" => "",
                    esc_html__( "Self", 'strata' ) => "_self",
                    esc_html__( "Blank", 'strata' ) => "_blank",
                    esc_html__( "Parent", 'strata' ) => "_parent"
                ),
                
            )
		)
) );

class WPBakeryShortCode_Qode_Clients  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => esc_html__( "Qode Clients", 'strata' ),
        "base" => "qode_clients",
        "as_parent" => array('only' => 'qode_client'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-qode_clients",
        "show_settings_on_create" => true,
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Columns", 'strata' ),
                "param_name" => "columns",
                "value" => array(
                    esc_html__( "Two", 'strata' )       => "two_columns",
                    esc_html__( "Three", 'strata' )     => "three_columns",
                    esc_html__( "Four", 'strata' )      => "four_columns",
                    esc_html__( "Five", 'strata' )      => "five_columns",
                    esc_html__( "Six", 'strata' )       => "six_columns"
                ),
				'save_always' => true,
                
            )
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Client extends WPBakeryShortCode {}
vc_map( array(
        "name" => esc_html__( "Qode Client", 'strata' ),
        "base" => "qode_client",
        "content_element" => true,
		"icon" => "icon-wpb-qode_client",
        "as_child" => array('only' => 'qode_clients'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Image", 'strata' ),
                "param_name" => "image"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Link", 'strata' ),
                "param_name" => "link"
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Link Target", 'strata' ),
                "param_name" => "link_target",
                "value" => array(
                    "" => "",
                    esc_html__( "Self", 'strata' ) => "_self",
                    esc_html__( "Blank", 'strata' ) => "_blank",
                    esc_html__( "Parent", 'strata' ) => "_parent"
                )
            )
        )
) );

class WPBakeryShortCode_Animated_Icons_With_Text  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => esc_html__( "Animated icons with text", 'strata' ),
        "base" => "animated_icons_with_text",
        "as_parent" => array('only' => 'animated_icon_with_text'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-animated_icons_with_text",
        "show_settings_on_create" => true,
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Columns", 'strata' ),
                "param_name" => "columns",
                "value" => array(
                    esc_html__( "Two", 'strata' )       => "two_columns",
                    esc_html__( "Three" , 'strata' )    => "three_columns",
                    esc_html__( "Four", 'strata' )      => "four_columns",
                    esc_html__( "Five", 'strata' )      => "five_columns"
                ),
				'save_always' => true,
                
            )
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Animated_Icon_With_Text extends WPBakeryShortCode {}
vc_map( array(
        "name" => esc_html__( "Animated icons with text", 'strata' ),
        "base" => "animated_icon_with_text",
		"icon" => "icon-wpb-animated_icon_with_text",
        "content_element" => true,
        "as_child" => array('only' => 'animated_icons_with_text'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				
            ),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text", 'strata' ),
				"param_name" => "text",
				
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Size", 'strata' ),
				"param_name" => "size",
				"value" => array(
					esc_html__( "Small", 'strata' ) => "fa-lg",
					esc_html__( "Normal", 'strata' ) => "fa-2x",
					esc_html__( "Large", 'strata' ) => "fa-3x"
				),
				'save_always' => true,
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Top Gradient Background Color", 'strata' ),
				"param_name" => "top_gradient_background_color",
				
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Bottom Gradient Background Color", 'strata' ),
				"param_name" => "bottom_gradient_background_color",
				
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Color", 'strata' ),
				"param_name" => "border_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color on hover", 'strata' ),
				"param_name" => "icon_color_hover",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Top Gradient Background Color On Hover", 'strata' ),
				"param_name" => "top_gradient_background_color_hover",
				
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Bottom Gradient Background Color On Hover", 'strata' ),
				"param_name" => "bottom_gradient_background_color_hover",
				
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Color On Hover", 'strata' ),
				"param_name" => "border_color_hover",
				
			)
        )
) );

class WPBakeryShortCode_Qode_Circles  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => esc_html__( "Qode Process Holder", 'strata' ),
        "base" => "qode_circles",
        "as_parent" => array('only' => 'qode_circle'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => esc_html__( 'by QODE', 'strata' ),
		"icon" => "icon-wpb-qode_circles",
        "show_settings_on_create" => true,
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Columns", 'strata' ),
                "param_name" => "columns",
                "value" => array(
                    esc_html__( "Three", 'strata' )     => "three_columns",
                    esc_html__( "Four", 'strata' )      => "four_columns",
                    esc_html__( "Five", 'strata' )      => "five_columns"
                ),
				'save_always' => true,
                
            ),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Line between Process", 'strata' ),
				"param_name" => "circle_line",
				"value" => array(
                    esc_html__( "No", 'strata' )   => "no_line",
					esc_html__( "Yes", 'strata' ) => "with_line",
				),
				'save_always' => true,
            )
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Circle extends WPBakeryShortCode {}
vc_map( array(
        "name" => esc_html__( "Qode Process", 'strata' ),
        "base" => "qode_circle",
        "content_element" => true,
		"icon" => "icon-wpb-qode_circle",
        "as_child" => array('only' => 'qode_circles'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
        	array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Type", 'strata' ),
				"param_name" => "type",
				"value" => array(
					esc_html__( "Icon in Process", 'strata' ) => "icon_type",
					esc_html__( "Image", 'strata' ) => "image_type",
					esc_html__( "Text in Process", 'strata' ) => "text_type"
				),
				'save_always' => true,
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Background Process Color", 'strata' ),
				"param_name" => "background_color",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Border Process Color", 'strata' ),
				"param_name" => "border_color",
				
			),
        	array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Icon", 'strata' ),
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				"dependency" => array('element' => "type", 'value' => array("icon_type"))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Size", 'strata' ),
				"param_name" => "size",
				"value" => array(
					esc_html__( "Tiny", 'strata' ) => "fa-lg",
					esc_html__( "Small", 'strata' ) => "fa-2x",
					esc_html__( "Normal", 'strata' ) => "fa-3x",
					esc_html__( "Large", 'strata' ) => "fa-4x",
					esc_html__( "Very Large", 'strata' ) => "fa-5x"
				),
				'save_always' => true,
				"dependency" => array('element' => "type", 'value' => array("icon_type"))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Icon Color", 'strata' ),
				"param_name" => "icon_color",
				"dependency" => array('element' => "type", 'value' => array("icon_type"))
			),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Image", 'strata' ),
                "param_name" => "image",
                "dependency" => array('element' => "type", 'value' => array("image_type"))
            ),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text in Process", 'strata' ),
				"param_name" => "text_in_circle",
				"dependency" => array('element' => "type", 'value' => array("text_type"))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Text in Process Tag", 'strata' ),
				"param_name" => "text_in_circle_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				"dependency" => array('element' => "text_in_circle", 'not_empty' => true)
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Text in Process Size (px)", 'strata' ),
                "param_name" => "font_size",
                "dependency" => array('element' => "text_in_circle", 'not_empty' => true)
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text in Process Color", 'strata' ),
				"param_name" => "text_in_circle_color",
				"dependency" => array('element' => "text_in_circle", 'not_empty' => true)
			),
			array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Link", 'strata' ),
                "param_name" => "link",
                
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Link Target", 'strata' ),
                "param_name" => "link_target",
                "value" => array(
                    "" => "",
                    esc_html__( "Self", 'strata' ) => "_self",
                    esc_html__( "Blank", 'strata' ) => "_blank",
                    esc_html__( "Parent", 'strata' ) => "_parent"
                ),
                "dependency" => array('element' => "link", 'not_empty' => true)
            ),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title", 'strata' ),
				"param_name" => "title",
				
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__( "Title Tag", 'strata' ),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					esc_html__( "h2", 'strata' ) => "h2",
					esc_html__( "h3", 'strata' ) => "h3",
					esc_html__( "h4", 'strata' ) => "h4",
					esc_html__( "h5", 'strata' ) => "h5",
					esc_html__( "h6", 'strata' ) => "h6",
				),
				"dependency" => array('element' => "title", 'not_empty' => true)
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Title Color", 'strata' ),
				"param_name" => "title_color",
				"dependency" => array('element' => "title", 'not_empty' => true)
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text", 'strata' ),
				"param_name" => "text",
				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text Color", 'strata' ),
				"param_name" => "text_color",
				"dependency" => array('element' => "text", 'not_empty' => true)
			)
        )
) );

/***************** Woocommerce Shortcodes *********************/
//
if(function_exists("is_woocommerce") && version_compare(strata_qode_get_vc_version(), '4.4.2') < 0) {

/**** Order Tracking ***/

vc_map( array(
		"name" => esc_html__( "Order Tracking", 'strata' ),
		"base" => "woocommerce_order_tracking",
		"icon" => "icon-wpb-woocommerce_order_tracking",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/*** Product price/cart button ***/

vc_map( array(
		"name" => esc_html__( "Product price/cart button", 'strata' ),
		"base" => "add_to_cart",
		"icon" => "icon-wpb-add_to_cart",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "ID", 'strata' ),
				"param_name" => "id",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "SKU", 'strata' ),
				"param_name" => "sku",
				
			)
		)
) );

/*** Product by SKU/ID ***/

vc_map( array(
		"name" => esc_html__( "Product by SKU/ID", 'strata' ),
		"base" => "product",
		"icon" => "icon-wpb-product",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "ID", 'strata' ),
				"param_name" => "id",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "SKU", 'strata' ),
				"param_name" => "sku",
				
			)
		)
) );


/*** Products by SKU/ID ***/

vc_map( array(
		"name" => esc_html__( "Products by SKU/ID", 'strata' ),
		"base" => "products",
		"icon" => "icon-wpb-products",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "IDS", 'strata' ),
				"param_name" => "ids",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "SKUS", 'strata' ),
				"param_name" => "skus",
				
			)
		)
) );

/*** Product categories ***/

vc_map( array(
		"name" => esc_html__( "Product categories", 'strata' ),
		"base" => "product_categories",
		"icon" => "icon-wpb-product_categories",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Number", 'strata' ),
				"param_name" => "number",
				
			)
		)
) );

/*** Products by category slug ***/

vc_map( array(
		"name" => esc_html__( "Products by category slug", 'strata' ),
		"base" => "product_category",
		"icon" => "icon-wpb-product_category",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Category", 'strata' ),
				"param_name" => "category",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Per Page", 'strata' ),
				"param_name" => "per_page",
				"value" => "12"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Columns", 'strata' ),
				"param_name" => "columns",
				"value" => "4"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order By", 'strata' ),
				"param_name" => "order_by",
				"value" => array(
					esc_html__( "Date", 'strata' ) => "date",
					esc_html__( "Title", 'strata' ) => "title",
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order", 'strata' ),
				"param_name" => "order",
				"value" => array(
					esc_html__( "DESC", 'strata' ) => "desc",
					esc_html__( "ASC", 'strata' ) => "asc"
				),
				'save_always' => true,
				
			)
		)
) );

/*** Recent products ***/

vc_map( array(
		"name" => esc_html__( "Recent products", 'strata' ),
		"base" => "recent_products",
		"icon" => "icon-wpb-recent_products",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Per Page", 'strata' ),
				"param_name" => "per_page",
				"value" => "12"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Columns", 'strata' ),
				"param_name" => "columns",
				"value" => "4"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order By", 'strata' ),
				"param_name" => "order_by",
				"value" => array(
					esc_html__( "Date", 'strata' ) => "date",
					esc_html__( "Title", 'strata' ) => "title",
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order", 'strata' ),
				"param_name" => "order",
				"value" => array(
					esc_html__( "DESC", 'strata' ) => "desc",
					esc_html__( "ASC", 'strata' ) => "asc"
				),
				'save_always' => true,
				
			),
		)
) );

/*** Featured products ***/

vc_map( array(
		"name" => esc_html__( "Featured products", 'strata' ),
		"base" => "featured_products",
		"icon" => "icon-wpb-featured_products",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Per Page", 'strata' ),
				"param_name" => "per_page",
				"value" => "12"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Columns", 'strata' ),
				"param_name" => "columns",
				"value" => "4"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order By", 'strata' ),
				"param_name" => "order_by",
				"value" => array(
					esc_html__( "Date", 'strata' ) => "date",
					esc_html__( "Title", 'strata' ) => "title",
				),
				'save_always' => true,
				
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Order", 'strata' ),
				"param_name" => "order",
				"value" => array(
					esc_html__( "DESC", 'strata' ) => "desc",
					esc_html__( "ASC", 'strata' ) => "asc"
				),
				'save_always' => true,
				
			),
		)
) );

/**** Shop Messages ***/

vc_map( array(
		"name" => esc_html__( "Shop Messages", 'strata' ),
		"base" => "woocommerce_messages",
		"icon" => "icon-wpb-woocommerce_messages",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Cart ***/

vc_map( array(
		"name" => esc_html__( "Pages - Cart", 'strata' ),
		"base" => "woocommerce_cart",
		"icon" => "icon-wpb-woocommerce_cart",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Checkout ***/

vc_map( array(
		"name" => esc_html__( "Pages - Checkout", 'strata' ),
		"base" => "woocommerce_checkout",
		"icon" => "icon-wpb-woocommerce_checkout",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** My Account ***/

vc_map( array(
		"name" => esc_html__( "Pages - My Account", 'strata' ),
		"base" => "woocommerce_my_account",
		"icon" => "icon-wpb-woocommerce_my_account",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Edit Address ***/

vc_map( array(
		"name" => esc_html__( "Pages - Edit Address", 'strata' ),
		"base" => "woocommerce_edit_address",
		"icon" => "icon-wpb-woocommerce_edit_address",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Change Password ***/

vc_map( array(
		"name" => esc_html__( "Pages - Change Password", 'strata' ),
		"base" => "woocommerce_change_password",
		"icon" => "icon-wpb-woocommerce_change_password",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** View Order ***/

vc_map( array(
		"name" => esc_html__( "Pages - View Order", 'strata' ),
		"base" => "woocommerce_view_order",
		"icon" => "icon-wpb-woocommerce_view_order",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Pay ***/

vc_map( array(
		"name" => esc_html__( "Pages - Pay", 'strata' ),
		"base" => "woocommerce_pay",
		"icon" => "icon-wpb-woocommerce_pay",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Thankyou ***/

vc_map( array(
		"name" => esc_html__( "Pages - Thankyou", 'strata' ),
		"base" => "woocommerce_thankyou",
		"icon" => "icon-wpb-woocommerce_thankyou",
		"category" => esc_html__( 'Woocommerce', 'strata' ),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

}