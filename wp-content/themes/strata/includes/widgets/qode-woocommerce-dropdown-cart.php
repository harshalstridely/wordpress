<?php
class Woocommerce_Dropdown_Cart extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'woocommerce-dropdown-cart', // Base ID
			esc_html__( 'Strata Woocommerce Dropdown Cart', 'strata' ), // Name
			array( 'description' => esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'strata' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		echo wp_kses_post( $before_widget );
		?>
		<div class="shopping_cart_header">
			<a class="header_cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i class="fa fa-shopping-cart"></i><span class="header_cart_span"><?php echo WC()->cart->cart_contents_count; ?></span></a>
			<div class="shopping_cart_dropdown">
            <div class="inner_arrow"></div><div class="inner_arrow2"></div>
			<div class="shopping_cart_dropdown_inner">
				<?php $list_class = array( 'cart_list', 'product_list_widget' ); ?>
					<ul class="<?php echo implode(' ', $list_class); ?>">
						
						<?php if ( ! WC()->cart->is_empty() ) : ?>
							<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
								$_product = $cart_item['data'];
								
								// Only display if allowed
								if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
									continue;
								}
								
								// Get price
								$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
								$product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
								?>

								<li class="woocommerce-mini-cart-item mini_cart_item">
									<?php
									// @codingStandardsIgnoreLine
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'strata' ),
										esc_attr( $cart_item_key ),
										esc_attr( $_product->get_sku() )
									), $cart_item_key );
									?>
									<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
										<?php echo strata_qode_get_module_part($_product->get_image()); ?>
										
										<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
									</a>
									<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
									
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								</li>

							<?php endforeach; ?>

						<?php else : ?>

							<li><?php esc_html_e( 'No products in the cart.', 'strata' ); ?></li>

						<?php endif; ?>
					</ul>
				</div>
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="qbutton dark view-cart"><?php esc_html_e( 'Cart', 'strata' ); ?> <i class="fa fa-shopping-cart"></i></a>
				<span class="total"><?php esc_html_e( 'Total:', 'strata' ); ?><span><?php wc_cart_totals_subtotal_html(); ?></span></span>
	</div>
</div>

	<?php
		echo wp_kses_post( $after_widget );
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		return $instance;
	}

}

function strata_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<span class="header_cart_span"><?php echo WC()->cart->cart_contents_count; ?></span>
	<?php
	$fragments['span.header_cart_span'] = ob_get_clean();
	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'strata_woocommerce_header_add_to_cart_fragment');
?>