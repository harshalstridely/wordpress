<?php

//Disable the default WooCommerce stylesheet.
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

if(!function_exists('strata_qode_woo_related_products_args')) {
    /**
     * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
     * @param $args array array of args for the query
     * @return mixed array of changed args
     */
    function strata_qode_woo_related_products_args( $args ) {
        $args['posts_per_page'] = 4;
        return $args;
    }

    add_filter( 'woocommerce_output_related_products_args', 'strata_qode_woo_related_products_args' );
}

// Redefine woocommerce_output_upsell_products()
if(!function_exists('strata_qode_woo_upsell_products_args')) {
    function strata_qode_woo_upsell_products_args( $args ) {
        $args['posts_per_page'] = 4;
        
        return $args;
    }
    
    add_filter( 'woocommerce_upsell_display_args', 'strata_qode_woo_upsell_products_args' );
}

// Display 12 products per page.
if ( ! function_exists( 'strata_qode_woocommerce_products_per_page' ) ) {
    /**
     * Function that sets number of products per page. Default is 9
     * @return int number of products to be shown per page
     */
    function strata_qode_woocommerce_products_per_page() {
        return 12;
    }

    add_filter('loop_shop_per_page', 'strata_qode_woocommerce_products_per_page', 20);
}

/**
 * Remove add to cart function from woocommerce_after_shop_loop_item_title hook
 * and hook it in woocommerce_before_shop_loop_item_title
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10);

/**
 * Overrides placeholder values for checkout fields
 * @param array all checkout fields
 * @return array checkout fields with overriden values
 */
function strata_qode_custom_override_checkout_fields($fields) {
    //billing fields
    $args_billing = array(
        'first_name' => esc_html__('First name','strata'),
        'last_name'  => esc_html__('Last name','strata'),
        'company'    => esc_html__('Company name','strata'),
        'address_1'  => esc_html__('Address','strata'),
        'email'      => esc_html__('Email','strata'),
        'phone'      => esc_html__('Phone','strata'),
        'postcode'   => esc_html__('Postcode / ZIP','strata'),
        'city'   => esc_html__('City','strata'),
        'state'   => esc_html__('State','strata')
    );
    
    //shipping fields
    $args_shipping = array(
        'first_name' => esc_html__('First name','strata'),
        'last_name'  => esc_html__('Last name','strata'),
        'company'    => esc_html__('Company name','strata'),
        'address_1'  => esc_html__('Address','strata'),
        'postcode'   => esc_html__('Postcode / ZIP','strata'),
        'city'   => esc_html__('City','strata')
    );
    
    //override billing placeholder values
    foreach ($args_billing as $key => $value) {
        $fields["billing"]["billing_{$key}"]["placeholder"] = $value;
    }
    
    //override shipping placeholder values
    foreach ($args_shipping as $key => $value) {
        $fields["shipping"]["shipping_{$key}"]["placeholder"] = $value;
    }

    return $fields;
}

// Hook in
add_filter('woocommerce_checkout_fields', 'strata_qode_custom_override_checkout_fields');

// Adds theme support for woocommerce 
add_theme_support('woocommerce');

if (!function_exists('strata_qode_woocommerce_content')){
    
    /**
     * Output WooCommerce content.
     *
     * This function is only used in the optional 'woocommerce.php' template
     * which people can add to their themes to add basic woocommerce support
     * without hooks or modifying core templates.
     *
     * @access public
     * @return void
     */
    function strata_qode_woocommerce_content() {
        
        if ( is_singular( 'product' ) ) {
            
            while ( have_posts() ) : the_post();
                
                wc_get_template_part( 'content', 'single-product' );
            
            endwhile;
            
        } else {
	
	        do_action( 'woocommerce_archive_description' );
            
            if ( have_posts() ) {
                
                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked wc_print_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action( 'woocommerce_before_shop_loop' );
                
                woocommerce_product_loop_start();
                
                if ( wc_get_loop_prop( 'total' ) ) {
                    while ( have_posts() ) {
                        the_post();
                        
                        /**
                         * Hook: woocommerce_shop_loop.
                         *
                         * @hooked WC_Structured_Data::generate_product_data() - 10
                         */
                        do_action( 'woocommerce_shop_loop' );
                        
                        wc_get_template_part( 'content', 'product' );
                    }
                }
                
                woocommerce_product_loop_end();
                
                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action( 'woocommerce_after_shop_loop' );
            } else {
                /**
                 * Hook: woocommerce_no_products_found.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action( 'woocommerce_no_products_found' );
            }
        }
    }
}

if ( ! function_exists( 'woocommerce_output_product_data_tabs' ) ) {

	/**
	 * Output the product tabs.
	 *
	 * @access public
	 * @subpackage	Product/Tabs
	 * @return void
	 */
	function woocommerce_output_product_data_tabs() {
		wc_get_template( 'single-product/tabs/tabs.php' );
                echo '</div>';
	}
}


if(!function_exists('strata_qode_woocommerce_change_actions_priorities')) {
    /**
     * Function that changes woocommerce actions priorities.
     * Used in product listing to put product rating bellow product price
     */
    function strata_qode_woocommerce_change_actions_priorities() {
        $actions = array(
            array(
                'tag' => 'woocommerce_after_shop_loop_item_title',
                'action' => 'woocommerce_template_loop_price',
                'priority' => 10,
                'priority_to_set' => 10
            ),
            array(
                'tag' => 'woocommerce_after_shop_loop_item_title',
                'action' => 'woocommerce_template_loop_rating',
                'priority' => 5,
                'priority_to_set' => 11
            )
        );
        
        foreach($actions as $action) {
            //actions which priorities needs to be changed
            remove_action($action['tag'], $action['action'], $action['priority']);
            
            //new priorities
            add_action($action['tag'], $action['action'], $action['priority_to_set']);
        }
    }
    
    add_action('woocommerce_change_priorities', 'strata_qode_woocommerce_change_actions_priorities');
    do_action('woocommerce_change_priorities');
}

/**
 * woo_custom_product_searchform
 *
 * @access      public
 * @since       1.0
 * @return      void
 */
function strata_qode_woo_qode_product_searchform($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
		<div>
			<label class="screen-reader-text" for="s">' . esc_html__( 'Search for:', 'strata' ) . '</label>
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search Products', 'strata' ) . '" />
			<input type="submit" id="searchsubmit" value="&#xf002" />
			<input type="hidden" name="post_type" value="product" />
		</div>
	</form>';

    return $form;
}

add_filter( 'get_product_search_form' , 'strata_qode_woo_qode_product_searchform' );

/* Removes double links around photos on lists and related items */
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);

//Override product title with our own html
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'strata_qode_changed_woocommerce_template_loop_product_title', 10 );

if ( ! function_exists( 'strata_qode_changed_woocommerce_template_loop_product_title' ) ) {
    function strata_qode_changed_woocommerce_template_loop_product_title() {
        the_title( '<h5>', '</h5>' );
    }
}

if ( ! function_exists( 'strata_qode_set_number_of_columns_woo_product_list' ) ) {
	function strata_qode_set_number_of_columns_woo_product_list() {
		global $woocommerce_loop;
		
		$woocommerce_loop['columns'] = 3;
	}
}