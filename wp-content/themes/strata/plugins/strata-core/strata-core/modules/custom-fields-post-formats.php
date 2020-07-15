<?php

/********************************************
 * Display meta boxes for post formats
 ********************************************/

// register fields
function strata_core_get_post_meta_box_fields() {
	$metaboxes = array(
		'link_post_format'  => array(
			'title'             => esc_html__( 'Link post format', 'strata-core' ),
			'applicableto'      => 'post',
			'location'          => 'normal',
			'display_condition' => 'post-format-link',
			'priority'          => 'high',
			'fields'            => array(
				'title_link' => array(
					'title'       => esc_html__( 'Link', 'strata-core' ),
					'type'        => 'text',
					'description' => '',
					'size'        => 100
				)
			)
		),
		'quote_post_format' => array(
			'title'             => esc_html__( 'Quote post format', 'strata-core' ),
			'applicableto'      => 'post',
			'location'          => 'normal',
			'display_condition' => 'post-format-quote',
			'priority'          => 'high',
			'fields'            => array(
				'quote_format' => array(
					'title'       => esc_html__( 'Quote', 'strata-core' ),
					'type'        => 'text',
					'description' => '',
					'size'        => 100
				)
			)
		),
		'video_post_format' => array(
			'title'             => esc_html__( 'Video post format', 'strata-core' ),
			'applicableto'      => 'post',
			'location'          => 'normal',
			'display_condition' => 'post-format-video',
			'priority'          => 'high',
			'fields'            => array(
				'video_format_choose' => array(
					'title'       => esc_html__( 'Choose Video Type', 'strata-core' ),
					'type'        => 'selectbox',
					'description' => ''
				),
				'video_format_link'   => array(
					'title'       => esc_html__( 'Video ID', 'strata-core' ),
					'type'        => 'text',
					'description' => '',
					'size'        => 100
				),
				'video_format_image'  => array(
					'title'       => esc_html__( 'Video image', 'strata-core' ),
					'type'        => 'image',
					'description' => '',
					'size'        => 100
				),
				'video_format_webm'   => array(
					'title'       => esc_html__( 'Video webm', 'strata-core' ),
					'type'        => 'text',
					'description' => '',
					'size'        => 100
				),
				'video_format_mp4'    => array(
					'title'       => esc_html__( 'Video mp4', 'strata-core' ),
					'type'        => 'text',
					'description' => '',
					'size'        => 100
				),
				'video_format_ogv'    => array(
					'title'       => esc_html__( 'Video ogv', 'strata-core' ),
					'type'        => 'text',
					'description' => '',
					'size'        => 100
				)
			)
		),
		'audio_post_format' => array(
			'title'             => esc_html__( 'Audio post format', 'strata-core' ),
			'applicableto'      => 'post',
			'location'          => 'normal',
			'display_condition' => 'post-format-audio',
			'priority'          => 'high',
			'fields'            => array(
				'audio_link' => array(
					'title'       => esc_html__( 'Audio Link', 'strata-core' ),
					'type'        => 'text',
					'description' => '',
					'size'        => 100
				)
			)
		),
	);
	
	return $metaboxes;
}

function strata_core_add_metaboxes() {
	$metaboxes = strata_core_get_post_meta_box_fields();
	
	if ( ! empty( $metaboxes ) ) {
		foreach ( $metaboxes as $id => $metabox ) {
			add_meta_box( $id, $metabox['title'], 'strata_core_show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
		}
	}
}

add_action( 'admin_menu', 'strata_core_add_metaboxes' );

// show meta boxes
function strata_core_show_metaboxes( $post, $args ) {
	$metaboxes = strata_core_get_post_meta_box_fields();
	
	$custom = get_post_custom( $post->ID );
	$fields = $metaboxes[ $args['id'] ]['fields'];
	
	/** Nonce **/
	$output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
	
	if ( ! empty( $fields ) ) {
		foreach ( $fields as $id => $field ) {
			
			if ( isset( $custom[ $id ][0] ) && $custom[ $id ][0] != "" ) {
				$value = $custom[ $id ][0];
			} else {
				$value = "";
			}
			
			switch ( $field['type'] ) {
				default:
				case "text":
					$output .= '<div class="form-field"><label for="' . $id . '"><b>' . $field['title'] . '</b></label><br/><input id="' . $id . '" type="text" name="' . $id . '" value="' . $value . '" size="' . $field['size'] . '" /></div>';
					break;
				case "image":
					$output .= '<div class="form-field"><label for="' . $id . '"><b>' . $field['title'] . '</b></label><br/><div class="image_holder"><input id="' . $id . '" class="' . $id . '" type="text" name="' . $id . '" value="' . $value . '" size="' . $field['size'] . '" /><input class="upload_button" type="button" value="' . esc_html__( 'Upload File', 'strata-core' ) . '"></div></div>';
					break;
				case "selectbox":
					$output .= '<div class="form-field"><label for="' . $id . '"><b>' . $field['title'] . '</b></label><br/><select id="' . $id . '" name="' . $id . '">';
					$output .= '<option ';
					if ( $value == "youtube" ) {
						$output .= 'selected="selected"';
					}
					$output .= ' value="youtube">' . esc_html__( 'YouTube', 'strata-core' ) . '</option>
								<option ';
					if ( $value == "vimeo" ) {
						$output .= 'selected="selected"';
					}
					$output .= ' value="vimeo">' . esc_html__( 'Vimeo', 'strata-core' ) . '</option>
								<option ';
					if ( $value == "self" ) {
						$output .= 'selected="selected"';
					}
					$output .= ' value="self">' . esc_html__( 'Self Hosted', 'strata-core' ) . '</option>
								</select></div>';
					break;
			}
		}
	}
	
	echo strata_qode_get_module_part( $output );
}

function strata_core_save_metaboxes( $post_id ) {
	$metaboxes = strata_core_get_post_meta_box_fields();
	
	if ( isset( $_POST['post_format_meta_box_nonce'] ) ) {
		$nonce = $_POST['post_format_meta_box_nonce'];
	} else {
		$nonce = wp_create_nonce( 'post_format_meta_box_nonce' );
	}
	// verify nonce
	if ( ! wp_verify_nonce( $nonce, basename( __FILE__ ) ) ) {
		return $post_id;
	}
	
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	
	// check permissions
	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}
	
	$post_type = get_post_type();
	
	// loop through fields and save the data
	foreach ( $metaboxes as $id => $metabox ) {
		// check if metabox is applicable for current post type
		if ( $metabox['applicableto'] == $post_type ) {
			$fields = $metaboxes[ $id ]['fields'];
			
			foreach ( $fields as $id => $field ) {
				$old = get_post_meta( $post_id, $id, true );
				$new = $_POST[ $id ];
				
				if ( $new && $new != $old ) {
					update_post_meta( $post_id, $id, $new );
				} elseif ( '' == $new && $old || ! isset( $_POST[ $id ] ) ) {
					delete_post_meta( $post_id, $id, $old );
				}
			}
		}
	}
}

// save meta boxes
add_action( 'save_post', 'strata_core_save_metaboxes' );

function strata_core_display_metaboxes() {
	$metaboxes = strata_core_get_post_meta_box_fields();
	
	if ( get_post_type() == "post" && ! empty( $metaboxes ) ) { ?>
		<script type="text/javascript">// <![CDATA[
			$ = jQuery;
			
			<?php
			$formats = $ids = array();
			foreach ( $metaboxes as $id => $metabox ) {
				array_push( $formats, "'" . $metabox['display_condition'] . "': '" . $id . "'" );
				array_push( $ids, "#" . $id );
			}
			?>
			
			var formats = { <?php echo implode( ',', $formats );?> };
			var ids = "<?php echo implode( ',', $ids ); ?>";
			
			function displayMetaboxes() {
				// Hide all post format metaboxes
				$(ids).hide();
				// Get current post format
				var selectedElt = $("input[name='post_format']:checked").attr("id");
				
				// If exists, fade in current post format metabox
				if (formats[selectedElt]) {
					$("#" + formats[selectedElt]).fadeIn();
				}
				
				// Show/hide metaboxes on change event
				$("input[name='post_format']").change(function () {
					displayMetaboxes();
				});
			}
			
			function qodefShowHidePostFormatsGutenberg() {
				var gutenbergEditor = $('.block-editor__container');
				
				if(gutenbergEditor.length) {
					var gPostFormatField = gutenbergEditor.find('.editor-post-format');
					
					gPostFormatField.find('select option').each(function () {
						$('#' + $(this).val() + '_post_format').hide();
					});
					
					if (gPostFormatField.find('select option:selected')) {
						$('#' + gPostFormatField.find('select option:selected').val() + '_post_format').fadeIn();
					}
					
					gPostFormatField.find('select').change(function(){
						qodefShowHidePostFormatsGutenberg();
					});
				}
			}
			
			$(function () {
				// Show/hide metaboxes on page load
				displayMetaboxes();
				qodefShowHidePostFormatsGutenberg();
			});
			
			// ]]></script>
	<?php }
}

add_action( 'admin_print_scripts', 'strata_core_display_metaboxes', 1000 );