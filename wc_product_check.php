<?php

function filter_woocommerce_add_to_cart_validation( $passed, $product_id, $quantity, $variation_id = null, $variations = null ) {
    // Retrieve the current user object
    $current_user = wp_get_current_user();
    
	if ( $product_id === add_your_id ){
		// Checks if a user (by email or ID or both) has bought an item
		if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, add_your_id ) ) {
			// Display an error message
			wc_add_notice( __( 'You can buy this ticket only once.', 'woocommerce' ), 'error' );

			$passed = false;
		}
	}

    return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'filter_woocommerce_add_to_cart_validation', 10, 5 );
