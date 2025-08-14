<?php
/**
 * Disable the Add to cart button conditionally.
 * For example, we will try to hide the button and the quantity selector when a variation is matched, which can be changed in the frontend.
 */

// I tried using `woocommerce/product-image`, but it seems the directives where not added at that point.
add_filter(
	'render_block_woocommerce/product-gallery-large-image',
	function( $block_content, $block ) {
		$p = new WP_HTML_Tag_Processor( $block_content );
		while ( $p->next_tag( 'img' ) ) {
			$p->remove_attribute( 'data-wp-on--mouseleave' );
			$p->remove_attribute( 'data-wp-on--mousemove' );
			$p->remove_attribute( 'data-wp-on--touchmove' );
			$p->remove_attribute( 'data-wp-on--touchstart' );
		}

		return $p->get_updated_html();
	},
	10,
	2
);
