<?php
/**
 * Disable the Add to cart button conditionally.
 * For example, we will try to hide the button and the quantity selector when a variation is matched, which can be changed in the frontend.
 */

add_action(
	'wp_enqueue_scripts',
	function() {
		$assets = include plugin_dir_path( dirname( __DIR__, 1 ) ) . 'build/hide-button.asset.php';

		wp_register_script_module(
			'hide-button-script',
			// I don't know how to make it work with the `build` file.
			// plugin_dir_url( dirname( __DIR__, 1 ) ) . 'build/hide-button.js',
			plugin_dir_url( dirname( __DIR__, 1 ) ) . 'src/hide-button/view.js',
			array( '@wordpress/interactivity' ),
			$assets['version'],
		);

		wp_register_style( 'hide-button-styles', plugin_dir_url( dirname( __DIR__, 1 ) ) . 'src/hide-button/style.css', array(), $assets['version'] );
	}
);

add_filter(
	'render_block_woocommerce/product-button',
	function( $block_content, $block ) {
		global $product;

		if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
			return $block_content;
		}

		// Add logic only for the variable products.
		if ( $product->get_type() === 'variable' ) {
			wp_enqueue_script_module( 'hide-button-script' );
			wp_enqueue_style( 'hide-button-styles' );
			// Add the Interactivity API state in the server. By default, the button is not hidden because no variation is sel.
			wp_interactivity_state(
				'woocommerce/add-to-cart-with-options',
				array(
					'isButtonHidden' => false,
				)
			);
			$p = new WP_HTML_Tag_Processor( $block_content );
			$p->next_tag();
			$p->set_attribute( 'data-wp-bind--hidden', 'woocommerce/add-to-cart-with-options::state.isButtonHidden' );

			return $p->get_updated_html() . '<span data-wp-bind--hidden="!state.isButtonHidden">This variation is not available</span>';
		};

		return $block_content;
	},
	10,
	2
);
