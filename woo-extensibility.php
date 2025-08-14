<?php
/**
 * Plugin Name:       Test Woo Extensibility
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.0
 * Description:       Plugin to test Woo frontend extensibility.
 * Author:            Mario Santos
 * License:           GPL-3.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       test-woo-extensibility
 * Requires Plugins:  woocommerce
 */

require_once __DIR__ . '/src/hide-button/index.php';
require_once __DIR__ . '/src/remove-zoom/index.php';
require_once __DIR__ . '/src/search-filter/index.php';

/**
 * Auto register all blocks found in the `build/blocks` folder.
 */
add_action( 'init', 'auto_register_block_types' );
function auto_register_block_types() {
	if ( file_exists( __DIR__ . '/build/blocks/' ) ) {
		$block_json_files     = glob( __DIR__ . '/build/blocks/*/block.json' );

		// auto register all blocks that were found.
		foreach ( $block_json_files as $filename ) {
			$block_folder = dirname( $filename );
			register_block_type( $block_folder );
		};
	};
}

// Avoid sending any JavaScript not related to the Interactivity API.
/**
 * Dequeue the Twemoji script.
 */
function dequeue_twemoji() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // Emojis.
}
add_action( 'wp_enqueue_scripts', 'dequeue_twemoji' );
