
$j(document).ready(function() {
	"use strict";

    var priceSliderFilter = $j('.price_slider_wrapper');
	if(priceSliderFilter.length) {
		priceSliderFilter.parents('.widget').addClass('widget_price_filter');
	}
    qodeInitSingleProductLightbox();
    initSelect2();
    initAddToCartPlusMinus();
});

function initSelect2(){
    $j('.woocommerce-ordering .orderby, #calc_shipping_country, #dropdown_product_cat').select2({
        minimumResultsForSearch: -1
    });
    $j('.woocommerce-account .country_select').select2();
}

function initAddToCartPlusMinus(){

	$j(document).on( 'click', '.quantity .plus, .quantity .minus', function() {

		// Get values
		var $qty		= $j(this).closest('.quantity').find('.qty'),
			currentVal	= parseFloat( $qty.val() ),
			max			= parseFloat( $qty.attr( 'max' ) ),
			min			= parseFloat( $qty.attr( 'min' ) ),
			step		= $qty.attr( 'step' );

		// Format values
		if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
		if ( max === '' || max === 'NaN' ) max = '';
		if ( min === '' || min === 'NaN' ) min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

		// Change the value
		if ( $j( this ).is( '.plus' ) ) {

			if ( max && ( max == currentVal || currentVal > max ) ) {
				$qty.val( max );
			} else {
				$qty.val( currentVal + parseFloat( step ) );
			}

		} else {

			if ( min && ( min == currentVal || currentVal < min ) ) {
				$qty.val( min );
			} else if ( currentVal > 0 ) {
				$qty.val( currentVal - parseFloat( step ) );
			}
		}

		// Trigger change event
		$qty.trigger( 'change' );
	});
}

/*
 ** Init Product Single Pretty Photo attributes
 */
function qodeInitSingleProductLightbox() {
	var item = $j('.single-product .images .woocommerce-product-gallery__image');
	
	if(item.length) {
		item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
		
		if (typeof prettyPhoto === "function") {
			prettyPhoto();
		}
	}
}