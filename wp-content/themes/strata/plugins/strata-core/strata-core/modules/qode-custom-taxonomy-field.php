<?php

function strata_core_slides_category_taxonomy_custom_fields($tag) {
    $t_id = $tag->term_id; // Get the ID of the term you're editing  
    $term_meta = get_option( "taxonomy_term_$t_id" );
?>  

<tr class="form-field">  
		<th scope="row" valign="top">  
				<label for="shortcode"><?php esc_html_e('Effect on header (dark/light style)', 'strata-core'); ?></label>
		</th>  
		<td>
			<select name="term_meta[header_effect]" id="term_meta[header_effect]">
				<option <?php if( $term_meta['header_effect'] == 'no' ){ echo "selected='selected'"; } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
				<option <?php if( $term_meta['header_effect'] == 'yes' ){ echo "selected='selected'"; } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
			</select>
		</td>  
</tr> 
<tr class="form-field">  
		<th scope="row" valign="top">  
				<label for="shortcode"><?php esc_html_e('Show prev/next thumbs', 'strata-core'); ?></label>
		</th>  
		<td>
			<select name="term_meta[slider_thumbs]" id="term_meta[slider_thumbs]">
				<option <?php if( isset($term_meta['slider_thumbs']) && $term_meta['slider_thumbs'] == 'no' ){ echo "selected='selected'"; } ?> value="no"><?php esc_html_e( 'No', 'strata-core' ); ?></option>
				<option <?php if( isset($term_meta['slider_thumbs']) && $term_meta['slider_thumbs'] == 'yes' ){ echo "selected='selected'"; } ?> value="yes"><?php esc_html_e( 'Yes', 'strata-core' ); ?></option>
			</select>
		</td>  
</tr> 
<tr class="form-field">  
    <th scope="row" valign="top">  
        <label for="shortcode"><?php esc_html_e('Slider shortcode', 'strata-core'); ?></label>
    </th>  
    <td>  
        <input type="text" name="term_meta[shortcode]" id="term_meta[shortcode]" size="25" style="width:60%;" value="<?php echo esc_attr($tag->slug ? "[qode_slider slider='".$tag->slug."' auto_start='true' slide_animation='6000' height='' background_color='']" : ""); ?>" readonly><br />
        <span class="description"><?php esc_html_e('Use this shortcode to insert it on page', 'strata-core'); ?></span>
    </td>  
</tr> 
  
<?php  
}

add_action( 'slides_category_edit_form_fields', 'strata_core_slides_category_taxonomy_custom_fields', 10, 2 );

function strata_core_save_taxonomy_custom_fields( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {  
        $t_id = $term_id;  
        $term_meta = get_option( "taxonomy_term_$t_id" );  
        $cat_keys = array_keys( $_POST['term_meta'] );  
            foreach ( $cat_keys as $key ){  
            if ( isset( $_POST['term_meta'][$key] ) ){  
                $term_meta[$key] = $_POST['term_meta'][$key];  
            }  
        }  
        update_option( "taxonomy_term_$t_id", $term_meta );  
    }  
}

add_action( 'edited_slides_category', 'strata_core_save_taxonomy_custom_fields', 10, 2 );

function strata_core_theme_columns($theme_columns) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'name' => esc_html__('Name', 'strata-core'),
        'shortcode' => esc_html__('Shortcode', 'strata-core'),
        'slug' => esc_html__('Slug', 'strata-core'),
        'posts' => esc_html__('Posts', 'strata-core')
        );
    return $new_columns;
}

add_filter("manage_edit-slides_category_columns", 'strata_core_theme_columns');


function strata_core_manage_theme_columns($out, $column_name, $theme_id) {
    $theme = get_term($theme_id, 'slides_category');
		switch ($column_name) {
        case 'shortcode':
            $data = maybe_unserialize($theme->description);
            $out .= "[qode_slider slider='".$theme->slug."' auto_start='true' slide_animation='6000' height='' background_color='']";
            break;
 
        default:
            break;
    }
    return $out;   
}

add_filter("manage_slides_category_custom_column", 'strata_core_manage_theme_columns', 10, 3);