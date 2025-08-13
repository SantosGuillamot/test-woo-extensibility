<?php
/**
 * Server rendering for the coupons block.
 *
 * @package test-woo-extensibility
 */

$wrapper_attributes = get_block_wrapper_attributes();
global $product;

if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
	return '';
}

$product_id       = $product->get_id();
$product_discount = 0;
$coupons          = get_posts(
	array(
		'posts_per_page' => -1,
		'post_type'      => 'shop_coupon',
		'post_status'    => 'publish',
	)
);

foreach ( $coupons as $coupon ) {
	// get the product ids meta value
	$product_ids = array_map( 'intval', explode( ',', get_post_meta( $coupon->ID, 'product_ids', true ) ) );
	foreach ( $product_ids as $id ) {
		if ( $id === $product_id ) {
			$product_coupon   = new WC_Coupon( $coupon->ID );
			$product_discount = $product_coupon->get_amount();
			break;
		}
	}
}

if ( $product_discount <= 0 ) {
	return '';
}
?>

<div 
	data-wp-interactive="test-woo-extensibility"
	<?php echo $wrapper_attributes; ?>
>
	<label>
		<input type="checkbox" name="apply_coupon" value="1" />
		Apply <?php echo $product_discount; ?>% discount coupon
	</label>
</div>
